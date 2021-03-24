<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Category;
use app\models\BillItem;
use app\models\Scategory;
use app\models\Doctor;
use \yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\BillItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bill-item-form">


    <?php $form = ActiveForm::begin(); ?>

        <!-- <?= $form->field($model, 'hospital_bill_id')->textInput() ?> -->

        <?=$form->field($model, 'category_id')->dropDownList(ArrayHelper::map(Category::find()->all(), 'id', 'name'),
            ['prompt'=>'Select Category',
                'onclick'=>'
                var category_id = $(this).val();
                console.log(category_id);
                $.get("index.php?r=scategory/data",{category_id:category_id}, function(data){
                    $( "select#billitem-subcategory_id" ).html( data ); 
                      
                     });',
                    

            ]); 
        ?>

        <?= $form->field($model, 'subcategory_id')->dropDownList(ArrayHelper::map(Scategory::find()->all(), 'id', 'name'),

            ['prompt'=>'Select subcategory',
                
                'onclick'=>'
                var subcategory_id = $(this).val();
                $.get("index.php?r=scategory/data1",{subcategory_id :subcategory_id}, function(data){
                    $("select#billitem-unit_rate").html( data );
                      
                });'
            ]); 
            
        ?> 

        <?php $dataList=ArrayHelper::map(Scategory::find()->asArray()->all(), 'id', 'amount');?>
        <?= $form->field($model, 'unit_rate')->dropDownList($dataList,['prompt'=>'-Choose a rate-' ])?>
    
    

        <?= $form->field($model, 'quantity')->textInput(['value'=>'1']); ?>

        <?= $form->field($model, 'amount')->textInput(['value'=>'1']) ?>

        <?php $dataList=ArrayHelper::map(Doctor::find()->all(), 'doctor_id', 'name');?>
        <?= $form->field($model, 'doctor_id')->dropDownList($dataList,['prompt'=>'-Choose a Doctor-']) ?> 


    

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>
<?php


$script = <<< JS
$(document).ready(function(){

    function update_quantity_new(selector){
        var parent = $(selector).closest('div');
        var qty = +(1);
        parent.next().next().children('#billitem-quantity').val(qty);
    }

    

    function update_amount_new(selector, unit){
        
        var parent = $(selector).closest('div');
        var qty = +($(selector).val());
        var amount = qty * unit;
        parent.next().children('#billitem-amount').val(amount);
    }

    function update_amount_new_2(selector, unit){
        var parent = $(selector).closest('div');
        var qty = +(parent.next().next().children('#billitem-quantity').val());
        var amount = qty * unit;
        parent.next().next().next().children('#billitem-amount').val(amount);
    }

    
    $('#billitem-quantity').change(function(){
        var unit_rate = +($(this).closest('div').prev().children('#billitem-unit_rate').val());
        update_amount_new(this, unit_rate);
    });

    $('#billitem-subcategory_id').change(function(){
        var amount = $(this).find(":selected").data("price");
        update_quantity_new(this);
        update_amount_new_2(this, amount);
    });


    
}); 
JS;
$this->registerJs($script, View::POS_END);
?>