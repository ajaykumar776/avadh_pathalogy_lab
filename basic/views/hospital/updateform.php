<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Receipt ;

/* @var $this yii\web\View */
/* @var $model app\models\HospitalBill */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hospital-bill-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'patient_id')->textInput(['disabled' => 'disabled']) ?>

    <?= $form->field($model, 'total_charges')->textInput(['disabled' => 'disabled']) ?>

    <?= $form->field($model, 'paid_amount')->textInput(['disabled' => 'disabled']) ?>

    <?php echo $form->field($model, 'payment_mode')->dropDownList(['UPI-payment' => 'UPI-payment', 'By-Cash' => 'By-Cash', 'paytm' => 'Paytm'],['prompt'=>'Select Payment-mode']);?>

    <?= $form->field($model, 'transaction_id')->textInput() ?>

    <?= $form->field($model, 'discount')->textInput()?>

    <!-- <?= $form->field($model, 'remaining_amount')->textInput() ?>

    <?= $form->field($model, 'final_amount')->textInput() ?> -->



   

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

