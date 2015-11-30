<?php
use yii\helpers\Html;
?>
<li>
    <div class="slide_item_data">
        <div class="one_item_image">
            <div class="item_state"><?= $model->state==1 ? "Б/у" : "Новый" ?></div>
            <?= Html::a(Html::img($model->picture),['items/view', 'id' =>$model->id ] ) ?>
        </div>
        <div class="goods_data">
            <?= Html::tag('p', Html::a($model->name,['items/view', 'id' =>$model->id ])) ?>
            <p class="item_prise_block"><span><?= $model->price ?></span> грн.</p>
            <?= Html::a('Купить', ['items/view', 'id' =>$model->id ], ['class' => 'bottom_block buy_item', 'data-id'=>$model->id]) ?>
        </div>
    </div>
</li>