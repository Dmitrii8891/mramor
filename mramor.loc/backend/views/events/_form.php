<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
$this->registerJsFile('@web/js/vendor/bower/jquery-file-upload/js/vendor/jquery.ui.widget.js');
$this->registerJsFile('@web/js/vendor/bower/jquery-file-upload/js/jquery.iframe-transport.js');
$this->registerJsFile('@web/js/vendor/bower/jquery-file-upload/js/jquery.fileupload.js');
?>

<div class="events-form">

    <?php $form = ActiveForm::begin(); ?>

    <fieldset>
        <legend>Фоновая картинка</legend>


        <?= $form->field($model, 'file')->fileInput(['id'=>'fileupload', 'data-url'=>"index.php?r=events/download-img"]); ?>

        <?= $form->field($model, 'cover')->hiddenInput(['id' => 'picture_link']) ?>

        <div id="img_block">
            <?= $model->cover ? '<img src='.$model->cover.'>': '' ?>
        </div>


    </fieldset>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'translit')->textInput(['maxlength' => 255]) ?>

    <?=  $form->field($model, 'description')->widget(CKEditor::className(),[
        'editorOptions' => [
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ],
    ]); ?>


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