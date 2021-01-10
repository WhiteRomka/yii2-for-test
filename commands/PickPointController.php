<?php

namespace app\commands;

use yii\console\Controller;

class PickPointController extends  Controller
{
    public function actionT()
    {
        for ($h = 0; $h<=23; $h++) {
            $response = $this->send($h);
            if (!$response == '[]') {
                var_dump($response);
            }
        }
        echo('------------------------------------------------------');
        echo PHP_EOL;
    }

    protected function send($h)
    {
        $h2 = 1 + $h;
        if ($h <= 9) {
            $h = '0'. $h;
        }
        if ($h2 <= 9) {
            $h2 = '0'. $h2;
        }

        $curl = curl_init();
        $data = [
            "SessionId"=> "1ecc21b9-59aa-4081-a6aa-e743d9b03522",
            "DateFrom"=> "14.05.20 ".$h.":00",
            "DateTo"=> "17.05.20 ".$h2.":00",
            "State"=> 111, //"<статус, если не указан, то возвращается по всем статусам>"
            "PostageType"=> 10001 // <вид отправления> 10001 оплаченый || 10003 наложенный
        ];
        $jsonData = json_encode($data);

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://e-solution.pickpoint.ru/api/getInvoicesChangeState",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS =>$jsonData,
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
}