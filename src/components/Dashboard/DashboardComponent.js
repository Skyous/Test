/**
 * @author Cesar Verduzco Reyna <cesar11augusto95@hotmail.com> 
 * @description Dashboard Component where we consume 2 apis to get the value of crypto coins convert USD to MXN
 * @version 1.0
 * * Version description:
 * v1.0 Created Component and consuming apis and show them with a convert function, the exchange rate
 * that we're gonna use will be 1 dolar for 20 pesos, it's better to consume an api of these exchange rates
 * but for the test purpose it be 20 pesos by default.
 * @date Created at 16/06/2021 Last Modified at 18/06/2021 
 * @status In Used
 */

//imports sections
import React, { useState, useEffect } from 'react';
import { useAuth } from '../../helpers/Helpers';


/**
 * Function Dashboard component
 * @returns componentrender
 */
export function DashboardComponent(){

    /**
     * getting the user info
     */
    const auth = useAuth();

    //auxiliar to establish crypto coin by default its btc
    const [auxTypeCoin,setAuxTypeCoin] = useState('btc');

    // use states type object to save each crypto coin value whit the date of the retrieve data
    const [coingeckoBtc, setCoingeckoBtc] = useState({});
    const [coingeckoEth, setCoingeckoEth] = useState({});
    const [coingeckoXrp, setCoingeckoXrp] = useState({});

    const [cryptoCompareBtc, setCryptoCompareBtc] = useState({});
    const [cryptoCompareEth, setCryptoCompareEth] = useState({});
    const [cryptoCompareXrp, setCryptoCompareXrp] = useState({});

    //end section of the use states

    //list auxiliars to save the data retrieve and show it them into a table
    const [listcoingeckoBtc ,setListCoinGeckoBtc] = useState([]);
    const [listcoingeckoEth, setListCoinGeckoEth] = useState([]);
    const [listcoingeckoXrp, setListCoinGeckoXrp] = useState([]);

    const [listcryptoCompareBtc, setListCryptoBtc] = useState([]);
    const [listcryptoCompareEth, setListCryptoEth] = useState([]);
    const [listcryptoCompareXrp, setListCryptoXrp] = useState([]);

    //end of the axuliar list section

    //section of the use states that it will shows into the render component for each source

    const [auxShowCoinGecko , setAuxShowCoinGecko] = useState({});
    const [auxShowCoinCrypto , setAuxShowCoinCrypto] = useState({});

    const [listauxShowCoinGecko, setListAuxShowCoinGecko] = useState([]);
    const [listauxShowCoinCrypto, setListAuxShowCoinCrypto] = useState([]);
    //end section


    //use state where it saves the convertions of MXN to crypto coin
    const [mxnToCrypto, setmxnToCrypto] = useState('');
    const [mxnToCoingecko, setmxnToCoingecko] = useState('');
    //end section of the convertions use state

    //section to handle custom styles depending of the crypto coin that shows in the table
    const [btnBTC,setBtnBTC] = useState('btn-section active');
    const [btnETH,setBtnETH] = useState('btn-section');
    const [btnXRP,setBtnXRP] = useState('btn-section');
    //end section

    //const value of the exchange rate UDS TO MXN
    const valueRateMx = 20;

    //value of the input, use state
    const [inputValue, setInputValue] = useState(0);
    
    //handle exchangeRate to MXN, because the data retrieve is in USD 
    const exchangeRateMx = (coin) =>{
        return (valueRateMx* coin);
    }

    //handle change of the input to convert the MXN of the value input to the value of the crypto coin
    const convertMxn = (evt) =>{
        setInputValue(evt.target.value);
        setmxnToCoingecko(evt.target.value/auxShowCoinGecko.valueCoin);
        setmxnToCrypto(evt.target.value/auxShowCoinCrypto.valueCoin);
    }

    //handle click function of the btn to change the cryto coin
    function changeBtnValues(type) {
        setAuxTypeCoin(type);
        setInputValue(0);
        setmxnToCoingecko(0);
        setmxnToCrypto(0);
        if(type==="btc"){
            setBtnBTC('btn-section active');
            setBtnETH('btn-section');
            setBtnXRP('btn-section');
            setAuxShowCoinGecko(coingeckoBtc);
            setAuxShowCoinCrypto(cryptoCompareBtc);
            setListAuxShowCoinGecko(listcoingeckoBtc);
            setListAuxShowCoinCrypto(listcryptoCompareBtc);
        }else if(type==='eth'){
            setBtnBTC('btn-section');
            setBtnETH('btn-section active');
            setBtnXRP('btn-section');
            setAuxShowCoinGecko(coingeckoEth);
            setAuxShowCoinCrypto(cryptoCompareEth);
            setListAuxShowCoinGecko(listcoingeckoEth);
            setListAuxShowCoinCrypto(listcryptoCompareEth);
        }else{
            setBtnBTC('btn-section');
            setBtnETH('btn-section');
            setBtnXRP('btn-section active');
            setAuxShowCoinGecko(coingeckoXrp);
            setAuxShowCoinCrypto(cryptoCompareXrp);
            setListAuxShowCoinGecko(listcoingeckoXrp);
            setListAuxShowCoinCrypto(listcryptoCompareXrp);
        }
    }

    // Similar to componentDidMount and componentDidUpdate:
    useEffect(() => {
        //creating aux list to push the data into these list, after that set state to the list where it gonna appers all the data retrieve each 15 seconds
        const auxListGeckoBTC = [];
        const auxListGeckoETH = [];
        const auxListGeckoXRP = [];
        const auxListCrytpBTC = [];
        const auxListCrytpETH = [];
        const auxListCrytpXRP = [];

        //starting an interval to consume these apis every 15 seconds, here it saves the last record into and it will push into the aux list
        //also it converts the value USD to MXN
        //then it will depend of the aux type that the user final want to see in the btn sections
        const intervalId = setInterval(
            async () => {
                const dateUpdate = Date().toLocaleString();
                const resCoingecko = await fetch('https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&ids=bitcoin,ethereum,ripple');
                const dataCoingecko = await resCoingecko.json();
                const coingeckobtc = exchangeRateMx(dataCoingecko[0].current_price);
                const coingeckoeth = exchangeRateMx(dataCoingecko[1].current_price);
                const coingeckoxrp = exchangeRateMx(dataCoingecko[2].current_price);
                setCoingeckoBtc({valueCoin : coingeckobtc, date: dateUpdate});
                setCoingeckoEth({valueCoin : coingeckoeth, date: dateUpdate});
                setCoingeckoXrp({valueCoin : coingeckoxrp, date: dateUpdate});
                auxListGeckoBTC.push({valueCoin : coingeckobtc, date: dateUpdate});
                auxListGeckoETH.push({valueCoin : coingeckoeth, date: dateUpdate});
                auxListGeckoXRP.push({valueCoin : coingeckoxrp, date: dateUpdate});
                setListCoinGeckoBtc(auxListGeckoBTC);
                setListCoinGeckoEth(auxListGeckoETH);
                setListCoinGeckoXrp(auxListGeckoXRP);
                const resCryptoCompare = await fetch('https://min-api.cryptocompare.com/data/pricemulti?fsyms=BTC,ETH,XRP&tsyms=USD');
                const dataCryptoCompare = await resCryptoCompare.json();
                const cryproBtc = exchangeRateMx(dataCryptoCompare.BTC.USD);
                const cryproEth = exchangeRateMx(dataCryptoCompare.ETH.USD);
                const cryproXrp = exchangeRateMx(dataCryptoCompare.XRP.USD);
                setCryptoCompareBtc({valueCoin : cryproBtc, date: dateUpdate});
                setCryptoCompareEth({valueCoin : cryproEth, date: dateUpdate});
                setCryptoCompareXrp({valueCoin : cryproXrp, date: dateUpdate});
                auxListCrytpBTC.push({valueCoin : cryproBtc, date: dateUpdate});
                auxListCrytpETH.push({valueCoin : cryproEth, date: dateUpdate});
                auxListCrytpXRP.push({valueCoin : cryproXrp, date: dateUpdate});
                setListCryptoBtc(auxListCrytpBTC);
                setListCryptoEth(auxListCrytpETH);
                setListCryptoXrp(auxListCrytpXRP);
                let typeSetTable = auxTypeCoin;
                console.log(typeSetTable);
                if(typeSetTable === 'btc'){
                    setAuxShowCoinGecko({valueCoin : coingeckobtc, date: dateUpdate});
                    setAuxShowCoinCrypto({valueCoin : cryproBtc, date: dateUpdate});
                    setListAuxShowCoinGecko(auxListGeckoBTC);
                    setListAuxShowCoinCrypto(auxListCrytpBTC);
                }else if(typeSetTable === 'eth'){
                    setAuxShowCoinGecko({valueCoin : coingeckoeth, date: dateUpdate});
                    setAuxShowCoinCrypto({valueCoin : cryproEth, date: dateUpdate});
                    setListAuxShowCoinGecko(auxListGeckoETH);
                    setListAuxShowCoinCrypto(auxListCrytpETH);
                }else{
                    setAuxShowCoinGecko({valueCoin : coingeckoxrp, date: dateUpdate});
                    setAuxShowCoinCrypto({valueCoin : cryproXrp, date: dateUpdate});
                    setListAuxShowCoinGecko(auxListGeckoXRP);
                    setListAuxShowCoinCrypto(auxListCrytpXRP);
                }
            }, 7000
        );
        //we're gonna clear this interval to repeat the loop for unsaving all the aux types
        return () => clearInterval(intervalId); //This is important
    }, [auxTypeCoin]);

    //simply validation to know when the data is already recieve this if can change for differents conditionals
    if (Object.keys(auxShowCoinGecko).length === 0 && Object.keys(auxShowCoinCrypto).length === 0) {
        return(
            <div className="dashboard col-grid-1">
                <div className="grettings">
                    <h3>Hi, {auth.user.name}</h3>
                    <h4>Info:</h4>
                    <p>Name: <strong>{auth.user.name}</strong></p>
                    <p>Last Name: <strong>{auth.user.lastname}</strong></p>
                    <p>Email: <strong>{auth.user.email}</strong></p>
                    <p>Phone: <strong>{auth.user.phone}</strong></p>
                </div>
                <div className="tables loading">
                    <p className="text-center">...loading</p>
                </div>
            </div>
        );
    }else{
        //if we have data from the apis it will shows into the screen, the final value of the crypto coin will be format to the local format
        return(
            <div className="dashboard col-grid-1">
                <div className="grettings">
                    <h3>Hi, {auth.user.name}</h3>
                    <h4>Info:</h4>
                    <p>Name: <strong>{auth.user.name}</strong></p>
                    <p>Last Name: <strong>{auth.user.lastname}</strong></p>
                    <p>Email: <strong>{auth.user.email}</strong></p>
                    <p>Phone: <strong>{auth.user.phone}</strong></p>
                </div>
                <div className="sections-coins col-grid-1">
                    <div className="col-grid-1">
                        <ul className="text-center">
                            <li><button onClick={() => changeBtnValues('btc')} className={btnBTC}>BTC</button></li>
                            <li><button onClick={() => changeBtnValues('eth')} className={btnETH}>ETH</button></li>
                            <li><button onClick={() => changeBtnValues('xrp')} className={btnXRP}>XRP</button></li>
                        </ul>
                    </div>
                </div>
                <div className="tables col-grid-3">
                    <div className="col-grid-1">
                        <div className="table-section">
                            <table>
                                <thead>
                                    <tr colSpan="2">
                                        <th>{Intl.NumberFormat().format(auxShowCoinGecko.valueCoin)}</th>
                                    </tr>
                                    <tr colSpan="2">
                                        <th>Gecko</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {listauxShowCoinGecko.map((gecko,indexGecko) => {if(gecko.valueCoin){
                                        return (( 
                                            <tr key={indexGecko}>
                                                <td>{Intl.NumberFormat().format(gecko.valueCoin)}</td>
                                                <td>{gecko.date}</td>
                                            </tr>
                                        ));
                                    }
                                    return null;})}
                                </tbody>
                                </table>
                        </div>
                    </div>
                    <div className="col-grid-1">
                        <div className="col-grid-1 table-section">
                            <div className="convert-section">
                                <div className="titulos-convert">
                                    <h4>Convert MX</h4>
                                </div>
                                <div className="col-gri-2">
                                        <div className="input-convert">
                                            <input type="number" step="any" name="changeMXNrate" value={inputValue} onChange={convertMxn}/>
                                        </div>
                                        <div className="convert-data">
                                            <div className="converts">
                                                <h4>To CryptoCompare</h4>
                                                <p>{Intl.NumberFormat().format(mxnToCrypto)}</p>
                                            </div>
                                            <div className="converts">
                                                <h4>To Coingecko</h4>
                                                <p>{Intl.NumberFormat().format(mxnToCoingecko)}</p>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="col-grid-1">
                        <div className="table-section">
                            <table>
                                <thead>
                                    <tr colSpan="2">
                                        <th>{Intl.NumberFormat().format(auxShowCoinCrypto.valueCoin)}</th>
                                    </tr>
                                    <tr colSpan="2">
                                        <th>CryptoCompare</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {listauxShowCoinCrypto.map((crypto,index) => {if(crypto.valueCoin){
                                        return (( 
                                            <tr key={index}>
                                                <td>{Intl.NumberFormat().format(crypto.valueCoin)}</td>
                                                <td>{crypto.date}</td>
                                            </tr>
                                        ));
                                    }
                                    return null;})}
                                </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
    
}

export default DashboardComponent;