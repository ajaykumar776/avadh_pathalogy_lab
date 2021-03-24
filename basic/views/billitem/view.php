<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BillItem */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bill Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="bill-item-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'hospital_bill_id',
            'category_id',
            'amount',
            'quantity',
            'unit_rate',
            'doctor_id',
            'subcategory_id',
            'created_datetime:datetime',
            'updated_datetime:datetime',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
