<?php
use yii\helpers\Html;
?>

<div class="scrl-img-text">
    <div class="scrl-img-wrap">
        <div class="scrl-img">
            <a href="#">
                <?=   Html::a(Html::img($model->image),['stone/view', 'translit' =>$model->translit ]) ?>
            </a>
        </div>
    </div>
    <div class="scrl-text">
        <?=  Html::a($model->name,['stone/view', 'translit' =>$model->translit ]) ?>
    </div>
</div>
