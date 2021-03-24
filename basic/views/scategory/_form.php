<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Category;
/* @var $this yii\web\View */
/* @var $model app\models\Scategory */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="scategory-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php
   $dataList=ArrayHelper::map(Category::find()->asArray()->all(), 'id', 'name');?>
   <?=$form->field($model, 'category_id')->dropDownList($dataList, 
            ['prompt'=>'-Choose a Course-']) ?>
            
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
  
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
