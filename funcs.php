<?php

function debug($arr){
    echo "<pre>";
        print_r($arr);
    echo "</pre>";
}


function myLog(){
    $fd = fopen( __DIR__ . "/tttttttttttttttttttttttttttt.txt", 'a') or die("не удалось создать файл");
    $str = "ok";
    $res =  fwrite($fd, $str);
    fclose($fd);

    if ($res) {
        die('ok');
    }
    die('bad');
}
