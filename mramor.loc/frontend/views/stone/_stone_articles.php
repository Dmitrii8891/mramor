<?php
use yii\helpers\Html;
?>
<div class="catalog-kamen-img-text">
    <div id="catalog-kamen-img-wrap">
        <div class="catalog-kamen-img"><?=  Html::a(Html::img($model->picture),['articles/view', 'translit' =>$model->translit ])  ?></div>
    </div>
    <div class="catalog-kamen-text">
        <?=  Html::a($model->title,['articles/view', 'translit' =>$model->translit ]) ?>
    </div>
</div>
