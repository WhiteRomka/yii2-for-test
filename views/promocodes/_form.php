<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;
use kartik\date\DatePicker;
//use kartikorm\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Promocodes */
/* @var $form yii\widgets\ActiveForm */
debug($model->errors);
?>

<div class="promocodes-form">

    <?php $form = ActiveForm::begin([
       // 'tooltipStyleFeedback' => true, // shows tooltip styled validation error feedback
    ]); ?>

    <?= $form->field($model, 'promocode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'started_at')->widget(DateTimePicker::class, [
    'options' => ['placeholder' => $model->attributeLabels()['started_at'], 'value' => $model->formatDate('d-m-Y H:i', $model->started_at)],
    'language' => 'ru',
    'pluginOptions' => [
        'autoclose' => true,
        'format' => 'dd-mm-yyyy hh:ii'
    ]
    ]); ?>

    <?= $form->field($model, 'expired_at')->widget(DateTimePicker::class, [
        'options' => ['placeholder' => $model->attributeLabels()['expired_at'], 'value' => $model->formatDate('d-m-Y H:i', $model->expired_at)],
        'language' => 'ru',
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-mm-yyyy hh:ii'
        ]
    ]); ?>


    <?php /* echo $form->field($model, 'started_at')->widget(DatePicker::class, [
        'attribute' => 'started_at',
        'attribute2' => 'expired_at',
        'options' => ['placeholder' => 'Start date', 'value' => $model->formatDate('d-m-Y', $model->started_at)],
        'options2' => ['placeholder' => 'End date', 'value' => $model->formatDate('d-m-Y', $model->expired_at)],
        'type' => DatePicker::TYPE_RANGE,
        //'form' =>$form,
        'pluginOptions' => [
            'format' => 'dd-mm-yyyy',
            'autoclose'=>true
        ]
    ]);*/ ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
