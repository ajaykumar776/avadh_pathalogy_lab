<?php

use kartik\datetime\DateTimePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\db\Expression;

/* @var $this yii\web\View */
/* @var $model app\models\Patient */
/* @var $form yii\widgets\ActiveForm */

?>
 <div class="container">

    <div class="patient-form">
    
        <?php $form = ActiveForm::begin(); ?>
        <div class="row card">
            <div class="col-sm-6">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>
                
                <?= $form->field($model, 'otp')->textInput() ?>
                   

                <?= $form->field($model, 'dob')->Input('date')?>


            </div>
            <div class="col-sm-6">

                <?php echo $form->field($model, 'is_verified')->dropDownList(['1' => 'True', '0' => 'False'],['prompt'=>'Select IsVerified']);?>

                <?php echo $form->field($model, 'gender')->dropDownList(['male' => 'MALE', 'female' => 'FEMALE', 'others' => 'OTHERS'],['prompt'=>'Select Gender']);?>


                <?php echo $form->field($model, 'blood_group')->dropDownList(['A' => 'A','A+' => 'A+', 'B' => 'B','B+' => 'B+', 'AB' => 'AB','AB+' => 'AB+','O' => 'O','O+' => 'O+'],['prompt'=>'Select Blood Group']);?>
                <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'guardian')->textInput(['maxlength' => true]) ?>

            </div>
        </div><hr>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-block']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
