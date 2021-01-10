<?php

namespace app\controllers;

use yii\web\Controller;

class PickPointController extends Controller
{
    public function actionT()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://e-solution.pickpoint.ru/api/getInvoicesChangeState",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS =>"{\r\n\"SessionId\": \"1ecc21b9-59aa-4081-a6aa-e743d9b03522\",\r\n\"DateFrom\": \"26.04.2020 10:00\",\r\n\"DateTo\": \"26.04.2020 11:00\",\r\n\"State\": null,\r\n\"PostageType\": null\r\n\r\n}",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;

        die;
    }
}