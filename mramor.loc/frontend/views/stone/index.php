<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\MyListView;
use frontend\models\FilterForm;
use yii\widgets\Pjax;
use frontend\components\Seo;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ItemsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Камни';
$this->params['breadcrumbs'][] = $this->title;

?>
<div id="stone_result" class="content-content">
    <div class="catalog-kamen">
        <p>КАТАЛОГ ПРИРОДНОГО КАМНЯ</p>
        <img src="/images/img-kamen/line-1.png"/>
    </div>


        <?php
        Pjax::begin();
        echo ListView::widget( [
            'dataProvider' => $dataProvider,
            'itemView'=>'_stone',
            'summary'=>'',
            'layout' => "<div id='items' class='catalog-kamen-img-text-wrap'>{items}</div><div id='pagination' class='pager-block'>{pager}</div>"
        ] );
        Pjax::end();
        ?>
</div>
<div class="content-last-block-wrap">
    <div class="content-last-block-img-wrap">
        <div class="catalog-kamen-img-text-wrap">
            <?php
            echo MyListView::widget( [
                'dataProvider' => $dataArticles,
                'itemView'=>'_stone_articles',
                'summary'=>'',
            ] );
            ?>
        </div>
    </div>
    <div class="content-last-block-text-wrap">
        <?= Seo::widget(['row'=>'seo_description']); ?>
    </div>
</div>
<script>
    jQuery(document).ready(function(){
        $(".filter_form_button").click(function(event){
            event.preventDefault();
            var host = window.location.hostname.toString();
            var form = $(this).parents('form');
            location.href = "http://"+host+"/items/filter?"+form.serialize();
        })
    })

</script>