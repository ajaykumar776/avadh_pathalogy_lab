<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BillSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bills';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bill-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Bill', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'bill_id',
            'total_amount',
            'paid_amount',
            'discount',
            'is_paid',
            //'dr_commission',
            //'created_datetime',
            //'updated_datetime',
            //'created_by',
            //'updated_by',
            //'patient_id',
            //'bill_url:url',
            //'payment_mode',
            //'transaction_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
