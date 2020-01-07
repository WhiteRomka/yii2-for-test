<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "film_tag".
 *
 * @property int $id
 * @property int $film_id
 * @property int $tag_id
 */
class FilmTag extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'film_tag';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['film_id', 'tag_id'], 'required'],
            [['film_id', 'tag_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'film_id' => 'Film ID',
            'tag_id' => 'Tag ID',
        ];
    }
}
