<?php

namespace app\modules\basket\models;

use Yii;

/**
 * This is the model class for table "basket_item".
 *
 * @property int $id
 * @property int $basket_id
 * @property int $product_id
 * @property string $created_at
 * @property int $deleted_at
 *
 * @property Product $product
 * @property Basket $basket
 */
class BasketItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'basket_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['basket_id', 'product_id'], 'required'],
            [['basket_id', 'product_id', 'created_at', 'deleted_at'], 'integer'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['basket_id'], 'exist', 'skipOnError' => true, 'targetClass' => Basket::className(), 'targetAttribute' => ['basket_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'basket_id' => Yii::t('app', 'Basket ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'deleted_at' => Yii::t('app', 'Deleted At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBasket()
    {
        return $this->hasOne(Basket::class, ['id' => 'basket_id']);
    }

    /**
     * {@inheritdoc}
     * @return BasketItemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BasketItemQuery(get_called_class());
    }
}
