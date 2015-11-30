<?php
use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\WorkType;
use backend\models\Cars;
use backend\models\ItemsCarData;
$this->registerJsFile('@web/js/vendor/bower/jquery-file-upload/js/vendor/jquery.ui.widget.js');
$this->registerJsFile('@web/js/vendor/bower/jquery-file-upload/js/jquery.iframe-transport.js');
$this->registerJsFile('@web/js/vendor/bower/jquery-file-upload/js/jquery.fileupload.js');
/* @var $this yii\web\View */
/* @var $model backend\models\Items */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="items-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype'=> 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'file')->fileInput(['id'=>'fileupload', 'data-url'=>"index.php?r=items/test-img"]); ?>

    <?= $form->field($model, 'picture')->hiddenInput(['id' => 'picture_link']) ?>

    <div id="img_block">
        <?= $model->picture ? '<img src='.$model->picture.'>': '' ?>
    </div>

    <?=  $form->field($model, 'text')->widget(CKEditor::className(),[
        'editorOptions' => [
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ],
    ]); ?>

    <?= $form->field($model, 'year')->textInput() ?>

    <?= $form->field($model, 'state')->dropDownList(['1'=>'б/у', '2' =>'Новые'])  ?>

    <?= $form->field($model, 'work_type')->dropDownList(
        \yii\helpers\ArrayHelper::map(WorkType::find()->all(), 'id', 'name'),
        ['prompt' => 'Выберите вид работ']
    )
    ?>

    <label class="control-label">Машины</label>
    <div>
        <?php foreach(Cars::find()->all() as $data):?>
            <div><label><input type="checkbox" name="ItemsCarData[][car_id]" value="<?= $data->id ?>" <?= ItemsCarData::isActive($data->id, $model->id) ? 'checked' : '' ?>><?= $data->brand ?></label></div>
        <?php endforeach; ?>
    </div>


    <?= $form->field($model, 'h1')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'translit')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'seo_text')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
