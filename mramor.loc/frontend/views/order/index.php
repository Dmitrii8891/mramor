<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ItemsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Корзина';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="items-index index_item_page">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <div id="result">
        <?php
        echo ListView::widget( [
            'dataProvider' => $dataProvider,
            'itemView'=>'_list',
        ] );
        ?>
    </div>

    <div class="total_price_block">
        <p>Всего за заказ <span class="total_price"><?= $total_price ?></span> грн.</p>
        <input type="hidden" id="total_price" name="OrderForm[total_price]" value="<?= $total_price ?>">
    </div>

    <?= $form->field($model, 'user_name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'phone_num')->textInput() ?>

    <?= $form->field($model, 'email')->textInput() ?>

    <?= $form->field($model, 'comment')->textarea() ?>


    <div class="form-group">
        <?= Html::submitButton('Заказать', ['class' =>  'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
