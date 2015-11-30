<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\QuickOrder */

$this->title = 'Update Quick Order: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Консультации', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновление';
?>
<div class="quick-order-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
