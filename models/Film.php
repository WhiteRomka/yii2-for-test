<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "film".
 *
 * @property int $id
 * @property string $name
 * @property string $user_id_affiliate
 */
class Film extends \yii\db\ActiveRecord
{

    public $a;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'film';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 220],
            //[['user_id_affiliate'], 'string', 'max' => 100],
            [['user_id_affiliate'], 'safe'],
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
        ];
    }

/*
    public function getFilmTag()
    {
        return $this->hasMany(FilmTag::class, ['film_id' => 'id']);
    }

    public function getTags()
    {
        return $this->hasMany(Tag::class, ['id' => 'tag_id'])->via('filmTag');
    }
*/

    public function getTags()
    {
        return $this->hasMany(Tag::class, ['id' => 'tag_id'])->viaTable('film_tag', ['film_id'=>'id']);
    }

    public function getTagsForFilm()
    {
        $tags = '';
        for ($i = 0; $i < count($this->tags); $i++) {
            $tags .= (isset($this->tags[1 + $i])) ? $this->tags[$i]['name'].', ' : $this->tags[$i]['name'];
        }
        return $tags;
    }


}
