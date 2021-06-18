/**
 * @author Cesar Verduzco Reyna <cesar11augusto95@hotmail.com> 
 * @description Component to manage the data of the user after get all the data info
 * Path of the different routes: /welcome 
 * @version 1.0
 * * Version description:
 * v1.0 Created Component and created routes
 * @date Created at 16/06/2021 Last Modified at 16/06/2021 
 * @status In Used
 */


/**
 * imports sections
 */
import React from 'react';
import {
    useHistory,
    useLocation,
} from 'react-router-dom';
import { useAuth, useInput } from '../../helpers/Helpers';

export default function WelcomeComponent(){

    /**}
     * creating the const that we're gonna use in the component
     */
    const history = useHistory();
    const location = useLocation();
    //Getting the useAuth to get the signin fake function
    const auth = useAuth();
    /**
     * Creating all the inputs that we're gonna ask to the final user
     */
    const {value:firstName, bind: bindFirstName} = useInput('');
    const {value:lastName, bind: bindLastName} = useInput('');
    const {value:emailInput, bind: bindEmailInput} = useInput('');
    const {value:phoneInput, bind: bindPhoneInput} = useInput('');

    /** sending the info to the login and redirect to the dashboard */
    const { from } = location.state || { from: { pathname: "/" } };
    const login = (evt) => {
        evt.preventDefault();
        //simply validation
        if(firstName === '' || lastName === '' || emailInput === '' || phoneInput === '')
        {return alert('Please fill all the fields.')}else{
            auth.signin(() => {
            history.replace(from);
            },firstName,lastName,emailInput,phoneInput);
        }
    };
    
    return(
        <div className="welcome">
            <form className="form" onSubmit={login}>
                <div className="col-grid-1">
                    <h1>Welcome to Front Engineer Challenge</h1>
                </div>
                <div className="col-grid-2">
                    <div className="col-grid-1 form-group ma-5">
                        <label for="name">First Name</label>
                        <input className="input-form" id="name" type="text" {...bindFirstName} />
                    </div>
                    <div className="col-grid-1 form-group ma-5">
                        <label for="lastName">Last Name:</label>
                        <input className="input-form" id="lastName" type="text" {...bindLastName} />
                    </div>
                </div>
                    <div className="col-grid-1 form-group mx-4">
                        <label for="emailInput">Email:</label>
                        <input className="input-form" id="emailInput" type="email" {...bindEmailInput} />
                    </div>
                    <div className="col-grid-1 form-group mx-4">
                        <label for="phoneInput">Phone:</label>
                        <input className="input-form" id="phoneInput" type="text" {...bindPhoneInput} />
                    </div>
                <input className="btn-submit" type="submit" value="Submit" />
            </form>
            
        </div>
        
    )
}

