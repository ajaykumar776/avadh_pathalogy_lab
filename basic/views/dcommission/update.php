<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dcommission */

$this->title = 'Update Dcommission: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Dcommissions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dcommission-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
