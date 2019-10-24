<?php

namespace app\components\filters;
use Yii;
use yii\base\ActionFilter;

/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 15.08.2019
 * Time: 21:32
 */
class ActionTimeFilter extends ActionFilter
{
    private $_startTime;

    public function beforeAction($action)
    {
        $this->_startTime = microtime(true);
        return parent::beforeAction($action);
    }

    public function afterAction($action, $result)
    {
        $time = microtime(true) - $this->_startTime;
        Yii::debug("Action '{$action->uniqueId}' spent $time second 2233445566778899.");
        return parent::afterAction($action, $result);
    }
}