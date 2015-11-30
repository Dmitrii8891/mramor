<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use common\components\SeoData;
/* @var $this yii\web\View */
/* @var $model common\models\Goods */
/* @var $form yii\widgets\ActiveForm */
$this->registerJsFile('@web/js/vendor/bower/jquery-file-upload/js/vendor/jquery.ui.widget.js');
$this->registerJsFile('@web/js/vendor/bower/jquery-file-upload/js/jquery.iframe-transport.js');
$this->registerJsFile('@web/js/vendor/bower/jquery-file-upload/js/jquery.fileupload.js');
?>

<div class="goods-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>


    <?=  $form->field($model, 'description')->widget(CKEditor::className(),[
        'editorOptions' => [
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ],
    ]); ?>

    <?= $form->field($model, 'category_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\common\models\Category::find()->all(),'id','name'),['prompt'=>'Категории']
    ) ?>

    <?= $form->field($model, 'stone')->dropDownList(
        \yii\helpers\ArrayHelper::map(\common\models\Stone::find()->all(),'id','name'),['prompt'=>'Камень']
    ) ?>

    <fieldset>
        <legend>Миниатюра</legend>
        <?= $form->field($model, 'file')->fileInput(['id'=>'fileupload', 'data-url'=>"index.php?r=goods/download-img"]); ?>

        <?= $form->field($model, 'image')->hiddenInput(['id' => 'picture_link']) ?>

        <div id="img_block">
            <?= $model->image ? '<img src='.$model->image.'>': '' ?>
        </div>
    </fieldset>


    <fieldset>
        <legend>Галерея</legend>


        <?= $form->field($model, 'file_three')->fileInput(['id'=>'fileupload_3', 'data-url'=>"index.php?r=goods/download-gallery", 'multiple'=> "multiple"]); ?>

        <?= $form->field($model, 'gallery')->hiddenInput(['id' => 'picture_link_3']) ?>

        <div id="img_block_3">
            <?php

            foreach($model->getGallery() as $image){
                echo $this->render('@app/views/goods/_gallery_item', [ 'item' => ['image'=>$image]]);
            }
            ?>
        </div>


    </fieldset>



    <?= $form->field($model, 'status')-> dropDownList(['new'=>'Новый', 'availability'=>'Готовый', 'objects'=>'проданный']); ?>

    <?= SeoData::widget(['item_id'=> $model->id, 'model'=>'Goods']); ?>

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


        $('#fileupload_3').fileupload({
            dataType: 'json',
            done: function (e, data) {

                var img = data.result.view;
                var block = $('#img_block_3');
                block.append(img);
                var gallery = $('#picture_link_3');
                gallery.val(gallery.val()+data.result.link+',');
            }
        });
        $('body').on('click','.delete-gallery-item', function(){
            var url = $(this).data('url');
            $(this).parent('.gallery_image').remove();
            var gallery = $('#picture_link_3');
            var urls = gallery.val();
            gallery.val(urls.replace(url+',', ""));
        })

    })
</script>
