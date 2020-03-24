<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\FilmSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Films';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="film-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Film', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <select class="form-control" name="FilmSearch[a]">
        <option value=""></option>
        <option value="Custom promocode" selected>Custom promocode</option>
        <option value="Auto creating promocode">Auto creating promocode</option>
    </select>

    <input type="checkbox" id="myCheckbox" value="aaa">


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
          /*  ['attribute' => 'tags', 'value' => function($model){
                $tags ='';
                foreach ($model->tags as $tag) {
                    $tags.= $tag->name;
               }
                return $tags;
            }],*/
            //'tagsForFilm',
            ['attribute' =>'a', 'filter' => [ "Custom promocode"=>"Custom promocode", "Auto creating promocode"=>"Auto creating promocode" ]],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

    <script>
        document.addEventListener('DOMContentLoaded', function(){
            $('#myCheckbox').change(function(e){
                var isChecked = $('#myCheckbox').prop('checked');
                var data;
                if (isChecked) {
                    data = 'checked';
                } else {
                    data = 'no';
                }
                $.get(
                    '/film/index',
                    {"aaa": data},
                    function(data){
                        console.log(data);
                    }
                )
            })
        });
    </script>

</div>
