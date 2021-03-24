<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BillItem */

$this->title = 'Create Bill Item';
$this->params['breadcrumbs'][] = ['label' => 'Bill Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bill-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
