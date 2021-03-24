<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Doctor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="doctor-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6" style="font-size:20px">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'degree')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'commission_in_percent')->textInput() ?><br>


            <!-- <?= $form->field($model, 'created_by')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'updated_by')->textInput(['maxlength' => true]) ?>  -->

            <div class="form-group">
                <?=Html::submitButton('Save', ['class' => 'btn btn-block btn-success']) ?>
            </div>

        </div>
        <div class="col-sm-3"></div>

        </div> 
    </div>

    <?php ActiveForm::end(); ?>

</div>
