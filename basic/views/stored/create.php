<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Stored */

$this->title = 'Create Stored';
$this->params['breadcrumbs'][] = ['label' => 'Storeds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stored-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
