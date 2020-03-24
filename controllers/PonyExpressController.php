<?php

namespace app\controllers;

use yii\web\Controller;
use \SoapClient;
use \StdClass;

class PonyExpressController extends Controller
{
    public function actionIndex()
    {

        ini_set("soap.wsdl_cache_enabled", "0"); // disabling WSDL cache
        ini_set("default_charset", "utf-8");     // русский текст для проверки UTF-8
        mb_internal_encoding("UTF-8");

        $client = new SoapClient("https://svc-api.p2e.ru/UI_Service.svc?singleWsdl", array( "cache_wsdl" => 0, "trace" => 1, "exceptions" => 0,
           // 'Content-Type' => 'application/json'
        ));

        /* Для функции SubmitRequest */
        $chk_query = new StdClass();
        $chk_query->accesskey = '8C0D2EFB-5A03-4B76-9CBD-0DC5C0401536';

        $request =
        '<?xml version="1.0" encoding="utf-8"?>
        <Request xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xsi:type="CitiesRequest">
            <ItemsPerPage>50</ItemsPerPage> <!--Optional-->
            <PageNumber>10</PageNumber> <!--Required-->
        </Request>';
        /*
        $request = '<?xml version="1.0" encoding="utf-8"?>
           <Request xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:type="HistoryRequest">
                    <Id>3</Id>
                    <DateFrom>2013-11-03T00:00:00+04:00</DateFrom>
                    <DateTo>2013-12-04T00:00:00+04:00</DateTo>
           </Request>';
        */
        $chk_query->requestBody = $request;
        try{
            $result = $client->SubmitRequest($chk_query);
            echo "<pre>";
            print_r ($result);
        }
        catch (SOAPFault $f){
            echo $f;
        }
    }

    public function actionTest()
    {
        $messageXml = require \Yii::getAlias('@app/config/exampleXml.php');
        $xml = simplexml_load_string($messageXml);

        $json = json_encode($xml);
        $array = json_decode($json,TRUE);

        debug($array['CityList']); die;
    }
}
