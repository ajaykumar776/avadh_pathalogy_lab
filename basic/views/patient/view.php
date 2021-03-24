<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Patient */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Patients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="patient-view">

    <h1 style="text-align:center"><?= Html::encode($this->title) ?></h1>
    <div  class="container">

        <p>
            <?= Html::a('Update', ['update', 'id' => $model->patient_id], ['class' => 'btn btn-primary']) ?>    
            <?= Html::a('Delete', ['delete', 'id' => $model->patient_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'patient_id',
                'name',
                'mobile',
                'otp',
                'address',
                'dob',
                'email:email',
                'android_id',
                'device_model',
                'is_verified',
                'gender',
                'created_datetime',
                'updated_datetime',
                'created_by',
                'updated_by',
                'blood_group',
                'guardian',
            ],
        ]) ?>
    </div><br><br><br><br>

</div>
