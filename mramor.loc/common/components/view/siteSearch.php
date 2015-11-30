<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<!--<div id="search">-->
<!--    <div id="search_div">-->
<!--        --><?php //$url = $this->getController()->createUrl('store/search'); ?>
<!--        --><?php //echo Html::beginForm($url); ?>
<!--        <div class="form-wrapper">-->
<!--            --><?//= Html::activeTextField($form,'string', array("id"=>"search", "placeholder"=>"Я ищу...")) ?>
<!--            --><?//= Html::error($form,'string'); ?>
<!--            --><?//= Html::SubmitButton('Найти', array("id"=>"submit")); ?>
<!--        </div>-->
<!--        --><?php //echo Html::endForm(); ?>
<!--    </div>-->
<!--    <div id="SearchFooter"></div>-->
<!--</div>-->

<div class="all-mramor-search">
    <?php $form = ActiveForm::begin(['options' => ['enctype'=> 'multipart/form-data', 'class'=>'form-search'], 'action' => '/']); ?>

    <?= $form->field($form, 'email',[
        'options'=>
            [
                'tag'=>'',
            ],
        'template' => "{input}",
    ])->textInput(['maxlength' => 255, 'placeholder' => 'Электронная почта','class'=>'mramor-search']) ?>

    <input class="search-text" type="submit" value="">
    <?php ActiveForm::end(); ?>
</div>