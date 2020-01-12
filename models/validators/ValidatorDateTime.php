<?php

namespace app\models\validators;

use yii\validators\Validator;

class ValidatorDateTime extends Validator
{
    public function validateAttribute($model, $attribute)
    {
        if (!empty($model->started_at) && !empty($model->expired_at)) {
            $model->started_at = $model->formatDate('Y-m-d H:i:s', $model->started_at );
            $model->expired_at = $model->formatDate('Y-m-d H:i:s', $model->expired_at);
            if ($model->started_at > $model->expired_at) {
                $this->addError($attribute, 'start > expired');
            }
        }
    }

}