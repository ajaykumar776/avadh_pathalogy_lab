<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Patient;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HospitalBillSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Paid Hospital Bills';
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
            [
                'label' => 'Patient Names',
                'value' => function ($data) {
                    $m = Patient::find()->where(["patient_id" => $data->patient_id])->one();
                    return $m->name;
                },
            ],
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

            ['class' => 'yii\grid\ActionColumn',
                'header'=>'Actions',
                'template' => "{view}{delete}"],
                 
                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => 'print bill',
                    
                    // 'headerOptions' => ['style' => 'color:#337ab7'],
                    'template' => "{bill}",
                    'buttons' => [
                    
                    'bill' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-print"></span>', $url, [
                            'title' => Yii::t('app', 'print-bill'),
                             
                        ]);
                    },
     
                    ],
                    'urlCreator' => function ($action, $model, $key, $index) {

                    if ($action === 'bill') {
                        $url ='index.php?r=billitem/bill&'.Yii::$app->request->get("id")."id=".$model->patient_id;
                        return $url;
                    }
                     
                    }
                     
                ],  
        ],
    ]); ?>


</div>
