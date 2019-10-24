<?php

use yii\grid\GridView;

/* @var $dataProvider \yii\data\ActiveDataProvider */

?>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'code',
        'name',
        'population',

        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>