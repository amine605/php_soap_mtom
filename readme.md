# PHP MTOM SOAP Support
#### Problem
Mtom (Message transmission  optimization mechanisme) is not supported by the SoapClient in PHP.
- According to the PHP Soap documentation, when developping the application you have to parse the response of the soap web service  that supports MTOM yourself
## Solution
 - Create a custom parser to parse the response of the Soap webservice
 - Override the SoapClient Class to use this parser when receiving a response from a server that supports MTOM 

> The MtomSoapClient ovverides the __doRequest of the SoapClient and use the Parser (Parser.php) to process the request.

# Usage
- Just make your requests when communicating with a Soap web service supporting MTOM using the MtomSoapClient instead of regular PHP SoapCLient

> The solution is inspired from Collisimo webservice documentation and PHP Soap documentation.

