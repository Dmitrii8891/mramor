<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
?>


<div class="all-mramor-search">
    <?php $form = ActiveForm::begin(['options' => ['enctype'=> 'multipart/form-data', 'class'=>'form-search'], 'action' => Url::toRoute('site/search'), 'method'=>'get']); ?>

    <?= $form->field($model, 'string',[
        'options'=>
            [
                'tag'=>'label',
            ],
        'template' => "{input}",
    ])->textInput(['maxlength' => 255, 'placeholder' => 'Поиск','class'=>'mramor-search']) ?>

    <input class="search-text" type="submit" value="">
    <?php ActiveForm::end(); ?>
</div>