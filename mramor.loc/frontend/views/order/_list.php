<?php
    use yii\helpers\Html;
    $num = Yii::$app->session->get('order');
?>
<div class="one_item_data">
    <div class="one_item_image">
        <div class="item_state"><?= $model->state==1 ? "б/у" : "Новый" ?></div>
        <?= Html::a(Html::img($model->picture),['items/view', 'id' =>$model->id ] ) ?>
    </div>
    <div class="goods_data">
        <?= Html::tag('p', Html::a($model->name,['items/view', 'id' =>$model->id ])) ?>
        <p class="item_prise_block"><span class="item_price"><?= $model->price ?></span> грн.</p>
        <label class="input_button"><input type="text" name="OrderForm[one_item][<?=$model->id?>][num]" class="form-control buy_one_item" value="<?= $num[$model->id]['num'] ?>">
            <p class="down_input_button"></p>
            <p class="up_input_button"></p>
        </label>
        <p class="item_prise_total_block">Всего <span class="one_item_total_price"><?= $model->price*$num[$model->id]['num'] ?></span> грн.</p>
        <span data-id="<?= $model->id ?>" class="glyphicon glyphicon-trash delete_order_item" aria-hidden="true"></span>
    </div>
</div>