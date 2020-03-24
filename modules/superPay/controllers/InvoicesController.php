<?php


namespace app\modules\superPay\controllers;

use yii\web\Controller;

class InvoicesController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}