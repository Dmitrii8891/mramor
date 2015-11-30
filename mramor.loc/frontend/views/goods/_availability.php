<?php
use yii\helpers\Html;
?>
<div class="collons-blocks-img-text">
    <div class="collons-blocks-img-wrap">
        <div class="collons-blocks-img">
            <?=  Html::a(Html::img($model->image),['goods/one-item', 'translit' =>$model->translit ])  ?>
        </div>
    </div>
    <div class="collons-blocks-text-wrap">
        <div class="collons-blocks-text">
            <?=  Html::a($model->name,['goods/one-item', 'translit' =>$model->translit ]) ?>
        </div>
        <?=  Html::a('Подробнее',['goods/one-item', 'translit' =>$model->translit ], ['class'=>'collons-blocks-text-button']) ?>
    </div>
</div>