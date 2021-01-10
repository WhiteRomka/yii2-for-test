<?php

namespace app\models;

use yii\base\Exception;

class GirlGenerator extends Girl
{
    private $names = ['Alice', 'Lara', 'Nasty', 'Vanda', 'Amanda', 'Kelly', 'Billy', 'Megan', 'Sharon', 'Ly'];
    private $cities = ['Moscow', 'NY', 'Boston', 'Paris'];
    private $prices = [1000, 1200, 1400, 1500, 2000, 5000];
    private $statuses = [1,2];
    private $ages = [18, 20, 25, 29, 30, 35];

    public function create($count = 1)
    {
        for ($i = 0; $i < $count; $i++) {
            $girl = new Girl();
            $girl->name = $this->names[array_rand($this->names)];
            $girl->city = $this->cities[array_rand($this->cities)];
            $girl->price = $this->prices[array_rand($this->prices)];
            $girl->status = $this->statuses[array_rand($this->statuses)];
            $girl->age = $this->ages[array_rand($this->ages)];

            if (!$girl->save()) {
                throw new \yii\db\Exception('Girl dont save');
            }
        }
    }
}