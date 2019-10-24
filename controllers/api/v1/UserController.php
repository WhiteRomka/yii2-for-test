<?php
namespace app\controllers\api\v1;

use app\models\api\v1\User;

class UserController extends BaseController
{
    public $modelClass = User::class;
}