<?php

namespace app\controllers;

use app\components\test\Test;
use yii\web\Controller;

class TestController extends Controller
{
    public function actionT()
    {
        $cities = Test::getCities();
       /* $a = [1,2,3,4,5];

        $a = array_map(function($el){
            return $el * $el;
        }, $a);

        array_walk($a, function(&$el){
            $el =  $el * $el;
        });*/
        $properties = [
            'City' => 'city',
            'UniqueId'=>'unique_id',
            'CashBan'=>'cash_ban',
            'Region'=>'region',
            'District'=>'district',
            'FiasId'=>'fias_id'
        ];

        $newCities = [];
        foreach ($cities as $city) {
            $newCity = [];
            foreach ($city as $k => $v) {
                foreach ($properties as $kProp => $vProp) {
                    if ($k == $kProp) {
                        $newCity[$vProp] = $v;
                    }
                }
            }
            $newCity['fias_id'] = $newCity['fias_id'] ?? null;
            $newCity['region'] = $newCity['region'] ?? null;
            $newCity['district'] = $newCity['district'] ?? null;
            $newCity = array_values($newCity);
            
            $newCities[] = $newCity;
        }
        return $newCities;
    }
}