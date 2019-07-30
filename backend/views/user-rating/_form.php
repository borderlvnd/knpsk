<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\Essences\UserRating */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-rating-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'rating')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
