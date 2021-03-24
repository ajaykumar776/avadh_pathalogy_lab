<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Scategory */

$this->title = 'Create Scategory';
$this->params['breadcrumbs'][] = ['label' => 'Scategories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scategory-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
