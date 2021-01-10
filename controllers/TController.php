<?php

namespace app\controllers;

use app\models\UserModel;
use yii\web\Controller;

class TController extends Controller
{
    public function actionIndex()
    {
        $user = new UserModel();
        $user->register();
        return $this->render('index');
    }

    public function actionT()
    {
        echo "30 - " . log10(30) . "<br>";
        echo " 10 - " . log10(10). "<br>";

        echo (log10(30)) - (log10(10));
        die;
    }
}