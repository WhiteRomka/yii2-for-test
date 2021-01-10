<?php


namespace app\models;

use app\components\behaviors\EmailSenderBehavior;
use yii\base\Model;

class UserModel extends Model
{
    public $name;
    public $email = 'some-email@email.com';
    public $phone;
    public $password;

    const EVENT_REGISTER = 'register';

    /**
     * Массив с поведениями
     *
     * @return array
     */
    public function behaviors()
    {
        return [
            ['class' => EmailSenderBehavior::class, 'email'=>$this->email]
        ];
    }

    public function register()
    {
        // calc and save in DB
        // ... code

        $this->trigger(self::EVENT_REGISTER);
    }
}