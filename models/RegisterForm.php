<?php

namespace app\models;

use yii\base\Model;

class RegisterForm extends Model
{
    public $username;
    public $email;
    public $password;

    public function rules()
    {
        return [
            [['username', 'email', 'password'], 'required'],
            [['username'], 'unique', 'targetClass'=>User::class, 'targetAttribute'=>'username'],
            ['email', 'email'],
            [['email'], 'unique', 'targetClass'=>User::class, 'targetAttribute'=>'email'],
            [['username',  'password'], 'string', 'length'=>[3,55]],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Имя',
            'email' => 'Email',
            'password' => 'Пароль',
        ];
    }

    /**
     * @return array|bool|mixed
     */
    public function register()
    {
        $user = new User();
        $user->attributes = $this->attributes;
        $user->setPassword($this->password);
        if ($user->validate() && $user->save()) {
            return true;
        }/*else{
           return($user->errors);
        }*/
        return false;
    }
}

