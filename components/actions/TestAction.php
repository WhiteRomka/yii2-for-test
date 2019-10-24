<?php

namespace app\components\actions;

use yii\base\Action;

class TestAction extends Action
{
    public function run()
    {
        echo "!!!!!"; die;
    }
}