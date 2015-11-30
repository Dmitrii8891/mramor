<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ItemsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Услуги СТО';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="items-index index_item_page">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    echo ListView::widget( [
        'dataProvider' => $dataProvider,
        'itemView'=>'_list',
    ] );
    ?>


</div>