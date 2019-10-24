<?php

namespace app\models;

use yii\base\Model;

class CommentForm extends Model
{
    public $email;
    public $comment;

    public function rules()
    {
        return [
            [['email', 'comment'], 'safe'],
        ];
    }
}