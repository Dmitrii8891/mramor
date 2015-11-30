<?php
/* @var $model frontend\models\Cars*/
use yii\helpers\Html;
?>
<div class="one_item">
    <div class="car_image">
        <img src="<?= $model->picture ?>">
        <div class="sto_data ">
            <div class="row_head">
                <p><?= $model->brand ?></p>
            </div>
            <div class="row_head">
                <?= Html::a('Цены ТО', ['cars/view', 'id' =>$model->id ]) ?>
            </div>
        </div>
    </div>
    <div class="car_data">
        <?php foreach($model->getItems() as $item):?>
            <p class="car_data_row"><?= Html::a("{$item->shortenString($item->name,20)}", ['items/view', 'id' =>$item->id ]) ?></p><p><?= $item->price?></p>
        <?php endforeach; ?>
    </div>
    <div class="car_more_info">
        <?= Html::a('Все запчасти на Opel', ['items/index', 'car_id' =>$model->id ]) ?>
    </div>
</div>