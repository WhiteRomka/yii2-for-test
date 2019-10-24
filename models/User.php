<?php

namespace app\models;

use Yii;
use yii\base\Exception;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\behaviors\TimestampBehavior;

/**
 * Class User
 * @package app\models
 * @property integer $id
 * @property string $username
 * @property string $auth_key // рандомная строка, записывается в beforeSave
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $access_token
 */
class User extends ActiveRecord implements IdentityInterface
{
    public static function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return [
            [['username', 'email'], 'required'],
            ['username', 'unique'],
            ['email', 'email'],
            ['email', 'unique'],
            [['username', 'email'], 'string', 'length'=>[3,55]],
            [['auth_key', 'password_hash'],'trim'],
            [['password_reset_token'], 'default', 'value'=>null],
            [['updated_at', 'created_at', 'access_token'],'safe']
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ]
            ]
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->auth_key = \Yii::$app->security->generateRandomString();
            }
            return true;
        }
        return false;
    }

    /** Устанавливаем пароль
     * @param $password
     */
    public function setPassword($password)
    {
        $passwordHash = Yii::$app->security->generatePasswordHash($password);
        $this->password_hash = $passwordHash;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function getId()
    {
        return $this->id;
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        //return static::findOne(['access_token' => $token]);
        //return static::findOne(['id' => 1]);
        //debug($token); die;
    }

    /** Установит для пользователя переданный AccessToken, ели не передать его сгенерирует автоматом
     * @param string|null $string
     */
    public function setAccessTokenAs(string $string = null)
    {
        if ($string) {
            $this->access_token = $string;
        } else {
            $this->access_token = Yii::$app->security->generateRandomString();
        }
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public function findByEmail($email)
    {
        return self::findOne(['email'=>$email]);
    }

    /** Сравнивает переданный пароль с хэшем из БД
     * @param $password
     * @return bool
     */
    public function validatePassword($password)
    {
        try{
            $result = Yii::$app->security->validatePassword($password, $this->password_hash);
        } catch(\Exception $e) {
            return false;
        }
        return $result;
    }
}