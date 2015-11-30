<?php
use yii\helpers\Html;
?>
<li>
    <div class="slide_item_data">
        <div class="one_item_image">
            <?= Html::a(Html::img($model->picture),['articles/view', 'id' =>$model->id ] ) ?>
        </div>
        <div class="goods_data">
            <?= Html::tag('p', Html::a($model->name,['articles/view', 'id' =>$model->id ])) ?>
        </div>
    </div>
</li>