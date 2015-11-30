<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use frontend\models\FilterForm;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ItemsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Запчасти';
$this->params['breadcrumbs'][] = $this->title;

$this->registerMetaTag(['name' => 'description', 'content' => 'This website is about funny raccoons.']);

?>

<div class="items-index index_item_page">

    <h1><?= Html::encode($this->title) ?></h1>
    <div id="result">
        <?php
        echo ListView::widget( [
            'dataProvider' => $dataProvider,
            'itemView'=>'_list',
        ] );
        ?>
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