<?php
use yii\helpers\Html;
?>
<div class="block-min-wrap">
    <div class="block-min-img"><?=  Html::a(Html::img($model->image),['goods/view', 'translit' =>$model->translit ])  ?></div>
    <div class="block-min-text"><?=  Html::a($model->name,['goods/view', 'translit' =>$model->translit ]) ?></div>
    <div class="block-min-line"></div>
</div>
