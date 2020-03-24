<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */


$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        This is the About page. You may modify the following file to customize its content:
    </p>

    <code><?= __FILE__ ?></code>
    <br>
    <br>
    <br>


    <p><label for="ck"><input id="ck" type="checkbox" name="check"> vgf gfdg </label></p>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        $(function() {

            $('input[name=check]').on('change', function(){
                //console.log('ckecked');
                //var ck =  $(this).is(':checked');
                console.log('ds');
            })

            //alert('11');

        });
    });
</script>

