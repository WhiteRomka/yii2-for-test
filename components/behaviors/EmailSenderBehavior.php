<?php


namespace app\components\behaviors;


use app\models\UserModel;
use yii\base\Behavior;

class EmailSenderBehavior extends Behavior
{
    public $email;

    public function events()
    {
        return [
            UserModel::EVENT_REGISTER => 'sendEmail'
        ];
    }

    public function sendEmail()
    {
        echo "Отправили письмо на почту " . $this->email; die;
    }
}