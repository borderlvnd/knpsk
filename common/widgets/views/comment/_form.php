<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model common\essence\Comment */
/* @var $form yii\widgets\ActiveForm */
/* @var $action */
?>

<div class="comment-form"   >

    <?php $form = ActiveForm::begin([
        'action' => $action,
    ]); ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 3])->label(false) ?>


    <?= $form->field($model, 'person_id')->hiddenInput(['value' => $personId])->label(false) ?>

    <?= $form->field($model, 'film_id')->hiddenInput(['value' => $filmId])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('add new comment', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>