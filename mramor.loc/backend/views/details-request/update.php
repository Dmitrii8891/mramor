<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DetailsRequest */

$this->title = 'Update Details Request: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Запрос "Подробнее"', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновление';
?>
<div class="details-request-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
