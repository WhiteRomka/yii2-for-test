<?php

namespace app\components\actions;

use yii\base\Action;

class RomAction extends Action
{
    public function run()
    {
        //debug($this); die;
        return $this->controller->render('@app/components/views/rom');
    }
}