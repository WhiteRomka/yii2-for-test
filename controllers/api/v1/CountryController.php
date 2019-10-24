<?php
namespace app\controllers\api\v1;

use app\models\api\v1\Country;
use app\controllers\api\v1\helpers\MyQueryParamAuth;

class CountryController extends BaseController
{
    public $modelClass = Country::class;
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        unset($behaviors['authenticator']);

        // API KEY AUTH(QueryParamAuth YII2)
        $behaviors['authenticator'] = [
            'class' => MyQueryParamAuth::class,

        ];
        return $behaviors;
    }
}