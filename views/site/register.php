<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\RegisterForm */
/* @var $errors array */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Register';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    if ($errors) {

        debug($errors);

        echo "<h2>Errors</h2>";
        foreach ($errors as $attr) {
            foreach ($attr as $error) {
                echo "<p class='text-danger'>$error</p>";
            }
        }
    }
    ?>

    <div class="col-sm-6">
        <?php $form = ActiveForm::begin() ?>
        <?= $form->field($model, 'username')->textInput() ?>
        <?= $form->field($model, 'email')->textInput() ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= Html::submitButton('Send', ['class' => 'btn btn-success']) ?>
        <?php ActiveForm::end() ?>
    </div>

</div>
