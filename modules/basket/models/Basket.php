<?php

namespace app\modules\basket\models;

use Yii;

/**
 * This is the model class for table "basket".
 *
 * @property int $id
 * @property int $user_id
 *
 * @property User $user
 * @property BasketItem[] $basketItems
 */
class Basket extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'basket';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBasketItems()
    {
        return $this->hasMany(BasketItem::class, ['basket_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return BasketQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BasketQuery(get_called_class());
    }
}
