<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\essences\Award */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="award-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'AwardName')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
