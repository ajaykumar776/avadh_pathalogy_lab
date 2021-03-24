<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HospitalBillSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hospital Bills';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hospital-bill-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Hospital Bill', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'patient_id',
            'total_charges',
            'paid_amount',
            'remaining_amount',
            'discount',
            'final_amount',
            //'created_datetime',
            //'updated_datetime',
            //'created_by',
            //'updated_by',
            //'is_deleted',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
