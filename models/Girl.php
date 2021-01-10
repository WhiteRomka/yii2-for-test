<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "girl".
 *
 * @property int $id
 * @property string $name
 * @property int $status
 * @property int $price
 * @property string $city
 * @property int $age
 */
class Girl extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'girl';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status', 'price', 'age'], 'integer'],
            [['name', 'city'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'status' => 'Status',
            'price' => 'Price',
            'city' => 'City',
            'age' => 'Age',
        ];
    }
}
