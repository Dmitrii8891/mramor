<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model backend\models\Items */
$this->registerJsFile('@web/js/skit.js');
$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Запчасти', 'url' => ['index', 'state' => \Yii::$app->session->get('state')]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="items-index one_item_page">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="one_item_data">
        <div class="one_item_image">
            <div class="item_state"><?= $model->state==1 ? "Б/у" : "Новый" ?></div>
            <?= Html::img($model->picture) ?>
        </div>
        <div class="goods_data">
            <h2>Подходит для</h2>
            <ul>
                <?php foreach($carData as $cars):?>
                    <li><?= $cars->brand ?></li>
                <?php endforeach; ?>
            </ul>
            <p class="item_prise_block"><span><?= $model->price ?></span> грн.</p>
            <label class="input_button"><input type="text" name="" class="form-control buy_one_item" value="1">
                <p class="down_input_button"></p>
                <p class="up_input_button"></p>
            </label>
            <?= Html::a('Купить', ['items/view', 'id' =>$model->id ], ['class' => 'bottom_block buy_item', 'data-id'=>$model->id ]) ?>
        </div>
    </div>

    <h2>Похожие товары:</h2>
    <div class="slider_bar">
        <div class="skit">
            <div class="skit-nav">
                <div class="skit-nav-clip">
                    <ul>
            <?php
                echo ListView::widget( [
                    'dataProvider' => $dataProvider,
                    'itemView'=>'_slide_item',
                ] );
            ?>
                    </ul>
                </div>

                <a href="#" class="skit-btn skit-nav-btn skit-nav-prev skit-btn-disable"></a>
                <a href="#" class="skit-btn skit-nav-btn skit-nav-next"></a>

            </div>
        </div>
    </div>


</div>
