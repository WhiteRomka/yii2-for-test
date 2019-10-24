<?php

namespace app\modules\basket\models;

/**
 * This is the ActiveQuery class for [[BasketItem]].
 *
 * @see BasketItem
 */
class BasketItemQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return BasketItem[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return BasketItem|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
