<?php

namespace app\modules\basket\models;

/**
 * This is the ActiveQuery class for [[Basket]].
 *
 * @see Basket
 */
class BasketQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Basket[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Basket|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
