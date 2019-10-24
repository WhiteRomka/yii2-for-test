<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 03.10.2019
 * Time: 15:04
 */

namespace app\controllers\api\v1;

use app\models\api\v1\User;
use yii\rest\ActiveController;
use yii\filters\auth\HttpBasicAuth;

class BaseController extends ActiveController
{
    /**
     * @return array
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::class,
            'auth' => function($username, $password) {
                return $this->auth($username, $password);
            }

        ];
        return $behaviors;
    }

    /** Найдет пользователя с таким логином и паролем и вернет его либо NULL
     * @param string $username
     * @param string $password
     * @return null|static
     */
    public function auth($username, $password)
    {
        if ($user = User::findOne(['username' => $username])) {
            if ($user->validatePassword($password)) {
                return $user;
            }
        }
        return null;
    }
}