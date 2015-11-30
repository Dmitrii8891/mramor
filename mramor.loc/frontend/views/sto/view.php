<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model backend\models\Items */
$this->registerJsFile('@web/js/skit.js');
$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Услуги СТО', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="items-index one_item_page">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="one_article_data">
        <?= $model->text ?>
    </div>
</div>
