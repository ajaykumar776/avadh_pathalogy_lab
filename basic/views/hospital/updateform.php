<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Receipt ;
use \yii\web\View;
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

    <?= $form->field($model, 'remaining_amount')->textInput(['disabled' => 'disabled']) ?>

    <?= $form->field($model, 'final_amount')->textInput(['disabled' => 'disabled']) ?>



   

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php


$script = <<< JS
$(document).ready(function(){

    function update_remaining_amount(selector, discount){
        var parent = $(selector).closest('div');
        var old_remaining_amount = +(parent.next().children('#hospitalbill-remaining_amount').val());
        var new_remaining_amount = +(old_remaining_amount-discount);
        parent.next().children('#hospitalbill-remaining_amount').val(new_remaining_amount);

    }

    function update_final_amount(selector, discount){
        var parent = $(selector).closest('div');
        var old_final_amount = +(parent.next().next().children('#hospitalbill-final_amount').val());
        var new_final_amount = +(old_final_amount-discount);
        parent.next().next().children('#hospitalbill-final_amount').val(new_final_amount);

    }
    
    $('#hospitalbill-discount').change(function(){
       var discount = $(this).val();

        update_remaining_amount(this,discount);
        update_final_amount(this,discount);
    });
    

    

    
}); 
JS;
$this->registerJs($script, View::POS_END);
?>