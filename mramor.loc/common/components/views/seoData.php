<?php
use yii\helpers\Html;
?>

<?= Html::beginTag('div',['class'=>'form-group'])?>
<?= Html::activeLabel($model,'seo_title',['class'=>'control-label'])?>
<?= Html::activeTextInput($model,'seo_title',['class'=>'form-control'])?>
<?= Html::endTag('div')?>

<?= Html::beginTag('div',['class'=>'form-group'])?>
<?= Html::activeLabel($model,'seo_h1',['class'=>'control-label'])?>
<?= Html::activeTextInput($model,'seo_h1',['class'=>'form-control'])?>
<?= Html::endTag('div')?>

<?= Html::beginTag('div',['class'=>'form-group'])?>
<?= Html::activeLabel($model,'seo_description',['class'=>'control-label'])?>
<?= Html::activeTextarea($model,'seo_description',['class'=>'form-control'])?>
<?= Html::endTag('div')?>

<?= Html::beginTag('div',['class'=>'form-group'])?>
<?= Html::activeLabel($model,'seo_translite',['class'=>'control-label'])?>
<?= Html::activeTextInput($model,'seo_translite',['class'=>'form-control'])?>
<?= Html::endTag('div')?>