<?php

namespace app\components\test;

use Faker\Factory;
use Faker\Provider\Address;

class Test
{
    public static function getCities()
    {
        $faker = Factory::create();
        $cities = [];
        for ($i = 0;  $i<10; $i++) {
            $ar = [
                'City'=>$faker->city,
                'UniqueId' => \Yii::$app->security->generateRandomString(),
                'CashBan' => random_int(0,1)
            ];
            if (random_int(1,10) > 3) {
                $ar['Region'] = $faker->state;
            }
            if (random_int(1,10) > 5) {
                $ar['District'] = $faker->streetAddress;
            }
            if (random_int(1,10) > 5) {
                $ar['FiasId'] = \Yii::$app->security->generateRandomString(10);
            }
            $cities[] = $ar;
        }
        return $cities;
    }
}