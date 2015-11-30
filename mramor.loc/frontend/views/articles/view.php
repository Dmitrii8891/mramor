<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Stone */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Статьи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="articles-one-item">
    <?=  Html::img($model->picture) ?>
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="content-last-block-text-wrap">
        <?= $model->body ?>
    </div>
</div>
