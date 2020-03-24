<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Film;

/**
 * FilmSearch represents the model behind the search form of `app\models\Film`.
 */
class FilmSearch extends Film
{
    public $tagsForFilm;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'tagsForFilm'], 'safe'],
             [['a'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Film::find()->with('tags');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);
        if ($this->a === "Custom promocode") {
            $query->andWhere('user_id_affiliate is null');
        } if ($this->a === "Auto creating promocode") {
                $query->andWhere('user_id_affiliate is not null');
        }


        $query->joinWith(['tags' => function ($q) {
            //$q->where('tag.name LIKE "%' . $this->tagsForFilm . '%"');
            $q->where("tag.name LIKE '%" . $this->tagsForFilm . "%'");
        }]);

        return $dataProvider;
    }
}
