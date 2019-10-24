<?php
namespace app\models\api\v1;

class User extends \app\models\User
{
    public function fields()
    {
        $fields = parent::fields();
        unset($fields['password_hash']);
        return $fields;
    }
}