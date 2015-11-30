<?php
    use yii\helpers\Html;
?>
<div class="one_sto_data">
        <?=  Html::a($model->name,['sto/view', 'id' =>$model->id ], ['class' => 'head_link']) ?>
        <div class="text_block_short">
            <?= $model->shortenString($model->text, 150); ?>
        </div>
</div>