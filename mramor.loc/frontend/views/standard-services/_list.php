<?php
use yii\helpers\Html;
?>


<div class="one_article_data">
    <div class="one_item_image">
        <?= Html::a(Html::img($model->picture),['articles/view', 'id' =>$model->id ] ) ?>
    </div>
    <div class="goods_data">
        <?= Html::tag('p', Html::a($model->name,['articles/view', 'id' =>$model->id ])) ?>
        <div class="text_block_short">
            <?= $model->body;  ?>
        </div>
    </div>
</div>