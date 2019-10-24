<?php

namespace app\components;
use yii\base\Component;

/**
 * Class MyLog
 * @package app\components
 */
class MyLog extends Component
{
    /**
     * @var
     */
    public $file;

    /**
     *
     */
    public function write(){
        //die('!');

        $fd = fopen(  '../'.$this->file, 'a') or die("не удалось создать файл");
        $str = ".";
        $res =  fwrite($fd, $str);
        fclose($fd);

        /*if ($res) {
            die('ok');
        }
        die('bad');*/
    }
}