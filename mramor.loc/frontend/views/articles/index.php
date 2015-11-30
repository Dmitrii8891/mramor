<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ItemsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Статьи';
$this->params['breadcrumbs'][] = $this->title;
?>
        <?php
            echo ListView::widget( [
                'dataProvider' => $dataProvider,
                'itemView'=>'_list',
                'summary'=>'',
                'layout' => "<div class='portfolio-block-left'>{items}</div>
                <div class='pager-block' id='pager-block-single'>{pager}</div>"
            ] );
        ?>
