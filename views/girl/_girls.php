<?php

use app\models\Girl;
use yii\data\ActiveDataProvider;
use yii\web\View;
use yii\widgets\LinkPager;

/** @var View */
/** @var ActiveDataProvider $dataProvider */

?>

<div class="container">

    <?php foreach ($dataProvider->getModels() as $girl):?>
        <?php /** @var Girl $girl */?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-sm-1">
                        <b> <?= $girl->id;?> </b>
                    </div>
                    <div class="col-sm-3">
                        <?= $girl->name;?>
                    </div>
                    <div class="col-sm-3">
                        <?= $girl->status;?>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-3">
                        <?= $girl->price;?> руб.
                    </div>
                    <div class="col-sm-3">
                        <?= $girl->age;?> лет.
                    </div>
                    <div class="col-sm-3">
                        <?= $girl->city;?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach;?>

    <?php
    echo LinkPager::widget([
        'pagination' =>$dataProvider->pagination,
    ]);
    ?>
</div>
