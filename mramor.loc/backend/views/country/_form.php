<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Country */
/* @var $form yii\widgets\ActiveForm */
$this->registerJsFile('@web/js/vendor/bower/jquery-file-upload/js/vendor/jquery.ui.widget.js');
$this->registerJsFile('@web/js/vendor/bower/jquery-file-upload/js/jquery.iframe-transport.js');
$this->registerJsFile('@web/js/vendor/bower/jquery-file-upload/js/jquery.fileupload.js');
?>

<div class="country-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>


    <fieldset>
        <legend>Миниатюра</legend>
        <?= $form->field($model, 'file')->fileInput(['id'=>'fileupload', 'data-url'=>"index.php?r=country/download-img"]); ?>

        <?= $form->field($model, 'image')->hiddenInput(['id' => 'picture_link']) ?>

        <div id="img_block">
            <?= $model->image ? '<img src='.$model->image.'>': '' ?>
        </div>
    </fieldset>


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
