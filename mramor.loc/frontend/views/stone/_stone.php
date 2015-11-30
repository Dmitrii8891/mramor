<?php
use yii\helpers\Html;
?>
<div class="catalog-kamen-img-text">
    <div id="catalog-kamen-img-wrap">
        <div class="catalog-kamen-img"><?=  Html::a(Html::img($model->image),['stone/view', 'translit' =>$model->translit ])  ?></div>
    </div>
    <div class="catalog-kamen-text">
        <?=  Html::a($model->name,['stone/view', 'translit' =>$model->translit ]) ?>
    </div>
</div>
