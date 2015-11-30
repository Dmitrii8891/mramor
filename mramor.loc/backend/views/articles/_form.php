<?php
use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\TypesOfProducts;
/* @var $this yii\web\View */
/* @var $model backend\models\Articles */
/* @var $form yii\widgets\ActiveForm */
$this->registerJsFile('@web/js/vendor/bower/jquery-file-upload/js/vendor/jquery.ui.widget.js');
$this->registerJsFile('@web/js/vendor/bower/jquery-file-upload/js/jquery.iframe-transport.js');
$this->registerJsFile('@web/js/vendor/bower/jquery-file-upload/js/jquery.fileupload.js');
?>

<div class="articles-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'translit')->textInput(['maxlength' => 250]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 250]) ?>

    <?=  $form->field($model, 'body')->widget(CKEditor::className(),[
        'editorOptions' => [
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ],
    ]); ?>

    <?= $form->field($model, 'file')->fileInput(['id'=>'fileupload', 'data-url'=>"index.php?r=articles/test-img"]); ?>

    <?= $form->field($model, 'picture')->hiddenInput(['id' => 'picture_link']) ?>

    <div id="img_block">
        <?= $model->picture ? '<img src='.$model->picture.'>': '' ?>
    </div>

    <?= $form->field($model, 'meta_title')->textInput(['maxlength' => 250]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => 250]) ?>

    <?= $form->field($model, 'h1')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'seo_text')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script>
    $(function(){

        $('#fileupload').fileupload({
            dataType: 'json',
            done: function (e, data) {
                var host = window.location.host.toString();
                var img = '<img src="http://'+host+data.result.link+'">';
                var block = $('#img_block');
                block.find('img').remove();
                block.append(img);
                $('#picture_link').val(data.result.link);
            }
        });


    })
</script>


