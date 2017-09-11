<?php

namespace DojoPHP;

require 'interfaceApi.php';

class API implements interfaceApi
{


    public function get($argm)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $argm);
        curl_setopt($ch, CURLOPT_REFERER, "http://www.example.org/yay.htm");
        curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);
        $decoded = json_decode($output);

        if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
            die('error occured: ' . $decoded->response->errormessage);
        }
        if (json_last_error() === JSON_ERROR_NONE) {
            //if not joson, is xml'
            return (($decoded));

        } else {
            // if json true, return json
            return (($output));

        }
    }
}