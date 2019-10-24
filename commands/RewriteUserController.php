<?php

namespace app\commands;

use app\models\User;
use yii\console\Controller;
use yii\console\ExitCode;

class RewriteUserController extends Controller
{
    public  function  actionIndex()
    {
        $users = User::find()->andWhere(['!=', 'id', 2999])->andWhere(['>=', 'id', 631])->all();
        $i = 0;
        foreach ($users as $user) {
            /** @var User $user */
            if ($user->password_hash) {
                $user->password_hash = \Yii::$app->security->generatePasswordHash($user->password_hash);
                $user->save();
            }

            if ($i >= 50) {
                echo "\r\n";
                $i = 0;
            }
            echo ".";
            $i++;
        }
        return ExitCode::OK;
        die;
    }
}