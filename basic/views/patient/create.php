<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Patient */

$this->title = 'Create Patient';
$this->params['breadcrumbs'][] = ['label' => 'Patients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-create">
    <div class="card-title" style="color:black">
        <h1 style="text-align:center;"><?= Html::encode($this->title) ?></h1><hr>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>