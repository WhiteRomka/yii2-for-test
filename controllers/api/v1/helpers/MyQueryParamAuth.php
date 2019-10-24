<?php
namespace app\controllers\api\v1\helpers;

use app\models\api\v1\User;

class MyQueryParamAuth extends \yii\filters\auth\QueryParamAuth
{
    /**
     * @param \yii\web\User $user
     * @param \yii\web\Request $request
     * @param \yii\web\Response $response
     * @return null|\yii\web\IdentityInterface
     */
    public function authenticate($user, $request, $response)
    {
        $accessToken = $request->get('access-token');
        return User::findOne(['access_token' => $accessToken]);
    }
}