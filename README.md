Frontend Engineer Technical Challenge
For this project, you must create a UI to ask some information to a user and give them the ability
to visualize the value of three different crypto coins from three different sources.
Below is an example of what we want to achieve:
Welcome Form
Before the user is capable of consulting the value of the different crypto coins, we want to gather
some basic information about them.Crypto Comparator
Once the users fill up their basic information, they can compare the value of different crypto
coins in a table.
Requirements
● The welcome screen and the dashboard screens should live in two different routes.
● The images are only a guide, feel free to create your own UI, we expect you to be able to
create good user interfaces on your own.
● The basic information gathered in the "welcome screen" should be shown in the header
of the Crypto Comparator.
● You could use any library, and tooling of your choice, but it must be a SPA built with
ReactJS.
● Currency value must be updated every 15 seconds and provide feedback on the UI.
● The CONVERT section should convert from MXN to all currencies without pressing any
buttons.● Once the project is done share the repository URL or send it as a .zip or .tar.gz file to this
email: \<insertemail\>
The application code will be reviewed and scored on these key
areas with many subset areas for each:
● Functionality.
● Code Format.
● Project Structure.
● Scalability.
● Maintainability.
● Use of industry best practices.
Bonus
● We encourage the use of functional components over class components.
- We'd like to see some testing.
● We appreciate good communication and want to see some documentation for this
project.
● If you have Docker experience, use Docker.
● If you need to use an external library it's okay to do it. Please be careful about what you
use.
Don'ts
● We don't want to see boilerplate code, please write your own code for most of the
functionality of this test. Create React App is accepted.
● We want to see your CSS writing skills, please refrain from using a UI library.Provider endpoints
● CryptoCompare:
Doc:
https://min-api.cryptocompare.com/documentation?key=Price&cat=multipleSymbolsPrice
Endpoint
Endpoint:
https://min-api.cryptocompare.com/data/pricemulti?fsyms=BTC,ETH,XRP&tsyms=USD
● Coingecko:
https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&ids=bitcoin,ethereum,
ripple
● StormGain: https://public-api.stormgain.com/api/v1/ticker
Considerations
● Feel free to use a different API as long as you are able to retrieve BTC, ETH, XRP, and
show at least two different providers shown in the image presented above.
● For the purpose of this test consider USDT, USDC the same as USD.
● The values from the API will be in USD. You will need to convert it then to MXN currency
in order to show it in the UI.Scenario problem
You are the tech lead of a project with three 3 developers in charge of the frontend application
designed to capture clients’ information into our platform. The stakeholders want to see the
changes implemented in the application in a weekly manner.
The frontend end transitions between screens are defined by a state machine, when the
conditions are met, the application is allowed to transition to the next state with the appropriate
screen. Each screen has a “Continue” button to navigate to the next screen once the state is
valid.
One particular screen in which this application has to communicate with two (2) external 3rd
party services (that don’t depend on the application backend) as part of the business process,
this is separated from the current state of the application, but is mandatory in order to continue.
As the tech lead, we would like to know your take on the following questions:
● What possible risk are you able to identify in this scenario?
● How would you deal with dependencies?
● What testing strategy would you suggest for this scenario?
● At the highest level possible, what would the implementation of this look like?
