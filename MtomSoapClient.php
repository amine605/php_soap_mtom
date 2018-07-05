<?php

require_once('Parser.php');

class MtomSoapClient extends SoapClient
{
    public function __doRequest($request, $location, $action, $version, $one_way = 0)
    {
        $response = parent::__doRequest($request, $location, $action, $version, $one_way);

        $parseResponse = new Parser($response);

        $resultat_tmp = $parseResponse->soapResponse;

        $soap_result = $resultat_tmp["data"];

        $error_code = explode("<id>", $soap_result);

        $error_code = explode("</id>", $error_code[1]);

        $data = array(

            "error" => $error_code[0],

            "attachement" => $parseResponse->attachments,

            "soapResponse" => $parseResponse->soapResponse,
        );

        return ($data);
    }
}



