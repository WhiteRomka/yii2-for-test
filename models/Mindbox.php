<?php

namespace app\models;

use yii\base\Model;

class Mindbox extends Model
{
    public static function t(){
        $u = new User();
        $u->username = 't';
        if($u->save(false)) {
            return true;
        }
        return false;
    }
}