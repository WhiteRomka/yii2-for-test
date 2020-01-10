<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Promocodes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="promocodes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'promocode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'started_at')->widget(DateTimePicker::class, [
    'options' => ['placeholder' => 'Enter event time ...', 'value' => $model->formatDate('d-m-Y H:i', $model->started_at)],
    'language' => 'ru',
    'pluginOptions' => [
        'autoclose' => true,
        'format' => 'dd-mm-yyyy hh:ii'
    ]
    ]); ?>

    <?= $form->field($model, 'expired_at')->widget(DateTimePicker::class, [
        'options' => ['placeholder' => 'Enter event time ...', 'value' => $model->formatDate('d-m-Y H:i', $model->expired_at)],
        'language' => 'ru',
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-mm-yyyy hh:ii'
        ]
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
