<?php
/** @var $obj */
/** @var $arr */
?>
<h1>ajaxTestReceiver</h1>
<ul>
    <? foreach ($arr as $one) {
        echo "<li> $one </li>";
    } ?>
</ul>

<p><?=$obj->a?></p>
<p><?=$obj->b?></p>