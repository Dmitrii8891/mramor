<?php
use backend\models\Colors;
use backend\models\Country;
use backend\models\TypeOfStone;
?>
<div class="side-bar-left-wrap">
    <form id="stone-filter-form">
        <div class="filter-wrap">
            <div class="title-filter">Ассортимент:</div>
            <?=$this->render('/_index_filter', [
                'rows'=>TypeOfStone::find()->all(),
                'filter'=> 'filter_one'
            ]);
            ?>
        </div>
        <div class="filter-wrap">
            <div class="title-filter">Цветовая гамма:</div>
            <?=$this->render('/_index_filter', [
                'rows'=>Colors::find()->all(),
                'filter'=> 'filter_two'
            ]);
            ?>
        </div>
        <div class="filter-wrap">
            <div class="title-filter">Страна производитель:</div>
            <?=$this->render('/_index_filter', [
                'rows'=>Country::find()->all(),
                'filter'=> 'filter_three'
            ]);
            ?>
        </div>
    </form>
</div>
