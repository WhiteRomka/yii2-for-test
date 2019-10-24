<?php
/* @var \yii\web\View $this */
/* @var \app\models\CommentForm $model */



use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\bootstrap\ActiveForm;
?>

<div class="col-sm-6">
<?php $form = ActiveForm::begin(['options' => ['class' => 'myForm'],]); ?>
    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'comment') ?>
    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'id'=>'myBtn']) ?>
    </div>
<?php ActiveForm::end(); ?>
</div>

<div class="col-sm-6">
    <h3 id="eml"></h3>
    <h3 id="comm"></h3>
</div>



