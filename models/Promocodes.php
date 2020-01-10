<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "promocodes".
 *
 * @property int $id
 * @property string $promocode
 * @property string $started_at
 * @property string $expired_at
 */
class Promocodes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'promocodes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['started_at', 'expired_at'], 'date', 'format' =>'php:d-m-Y H:i'],
            [['started_at'], 'validateDateTime'],
            [['promocode'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'promocode' => 'Promocode',
            'started_at' => 'Started At',
            'expired_at' => 'Expired At',
        ];
    }

    public function validateDateTime($attribute, $params)
    {
        if (!empty($this->started_at) && !empty($this->expired_at)) {
            $this->started_at = $this->formatDate('Y-m-d H:i:s', $this->started_at );
            $this->expired_at = $this->formatDate('Y-m-d H:i:s', $this->expired_at);
            if ($this->started_at > $this->expired_at) {
                $this->addError($attribute, 'start > expired');
            }
        }
    }

    /**
     * @param string $formatTo
     * @param $date
     * @return false|string|null
     */
    public function formatDate(string $formatTo, $date) {
        if (is_int($date)) {
            $res = date($formatTo, $date);
        }elseif (is_string($date)) {
            $res = date($formatTo, strtotime($date));
        } else {
            $res = null;
        }
        return $res;
    }


}
