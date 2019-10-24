<?php
namespace app\controllers\api\v1;

use app\models\api\v1\Post;
use app\models\api\v1\User;
use yii\filters\auth\HttpBearerAuth;

class PostController extends BaseController
{
    public $modelClass = Post::class;

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        unset($behaviors['authenticator']);

        // BEARER TOKEN AUTH
        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::class,
        ];
        return $behaviors;
    }
}