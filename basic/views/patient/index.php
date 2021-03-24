<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url ;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PatientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Patients';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="patient-index">

    <h1 style="text-align:center"><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="container">

        <p>
            <?= Html::a('Create Patient', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                // 'patient_id',
                'name',
                'email:email',
                // 'address',
                'mobile',
                 'dob',
                // 'otp',
                //'android_id',
                //'device_model',
                //'is_verified',
                //'gender',
                //'created_datetime',
                //'updated_datetime',
                //'created_by',
                //'updated_by',
                //'blood_group',
                //'guardian',


                ['class' => 'yii\grid\ActionColumn',
                'header'=>'Actions',
                'template' => "{view} {update}{delete}"],
                 
                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => 'Add bill',
                    
                    // 'headerOptions' => ['style' => 'color:#337ab7'],
                    'template' => "{add}",
                    'buttons' => [
                    
                    'add' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-briefcase"></span>', $url, [
                            'title' => Yii::t('app', 'Add-bill'),
                             
                        ]);
                    },
     
                    ],
                    'urlCreator' => function ($action, $model, $key, $index) {

                    if ($action === 'add') {
                        $url ='index.php?r=billitem/create&'.Yii::$app->request->get("id")."id=".$model->patient_id;
                        return $url;
                    }
                     
                    }
                     
                ],
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
        <br><br><br><br><br>
    </div>


</div>
<i class="fa fa-receipt"></i>