<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Dcommission */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dcommission-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'doctor_id')->textInput() ?>

    <?= $form->field($model, 'bill_item_id')->textInput() ?>

    <?= $form->field($model, 'commission')->textInput() ?>

    <!-- <?= $form->field($model, 'created_datetime')->textInput() ?>

    <?= $form->field($model, 'updated_datetime')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'updated_by')->textInput(['maxlength' => true]) ?> -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
