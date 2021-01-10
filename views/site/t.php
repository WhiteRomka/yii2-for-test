<?php

use app\models\Post;
use yii\data\Pagination;
use yii\web\View;
use yii\widgets\LinkPager;

/** @var View $this */
/** @var Post[] $posts */
/** @var Pagination $pages */
?>
<div class="container">
    <?php foreach($posts as $post):?>
        <div class="panel panel-default">
            <div class="panel-body">
                <p>id: <?= $post->id?></p>
                <p>title: <?= $post->title?></p>
                <p><b>text: <?= $post->text?></b></p>
            </div>
        </div>
    <?php endforeach;?>
</div>
<?= LinkPager::widget([
    'pagination' => $pages,
]);?>
