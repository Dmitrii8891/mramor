<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\DetailsRequest */

$this->title = 'Create Details Request';
$this->params['breadcrumbs'][] = ['label' => 'Запрос "Подробнее"', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="details-request-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
