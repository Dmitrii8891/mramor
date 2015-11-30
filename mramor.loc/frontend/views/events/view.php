<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Stone */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Акции', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="events-one-item">
    <?=  Html::img($model->cover) ?>
    <h1><?= $model->name?></h1>
    <div class="content-last-block-text-wrap">
        <?= $model->description?>
    </div>
</div>
