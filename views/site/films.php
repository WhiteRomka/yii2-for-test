<?php
/** @var Film $films */
use app\models\Film;

?>
<h1>Films</h1>

<ul>
    <? foreach ($films as $film) :?>
    <p><?=$film->name?> - <? foreach($film->tags as $tag) { echo $tag->name . ', '; } ?></p>
    <? endforeach;?>
</ul>

<?
debug($films);
?>
