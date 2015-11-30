<?php

use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Cars */
/* @var $form yii\widgets\ActiveForm */
$this->registerJsFile('@web/js/vendor/bower/jquery-file-upload/js/vendor/jquery.ui.widget.js');
$this->registerJsFile('@web/js/vendor/bower/jquery-file-upload/js/jquery.iframe-transport.js');
$this->registerJsFile('@web/js/vendor/bower/jquery-file-upload/js/jquery.fileupload.js');
?>

<div class="cars-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype'=> 'multipart/form-data']]); ?>

    <?= $form->field($model, 'brand')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'file')->fileInput(['id'=>'fileupload', 'data-url'=>"index.php?r=cars/test-img"]); ?>

    <?= $form->field($model, 'picture')->hiddenInput(['id' => 'picture_link']) ?>

    <div id="img_block">
        <?= $model->picture ? '<img src='.$model->picture.'>': '' ?>
    </div>

    <?=  $form->field($model, 'sto_text')->widget(CKEditor::className(),[
        'editorOptions' => [
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ],
    ]); ?>

    <label class="control-label">Работы и цены</label>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Название</th>
            <th>Цена</th>
            <th class="table-buttons"></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach( $modelSS as $data): ?>
            <?php if(!$data->work_type): ?>
                <tr class="<?= $data->isActive($model->id) ? 'active_': 'non_active' ?>">
                    <td><?= $data->name ?></td>
                    <td>
                        <input type="text"  class="service-price" <?= $data->isActive($model->id) ? '': 'disabled="disabled"' ?> name="ModelSS[<?= $data->id ?>][price]" value="<?= $data->getPrice($model->id) ?>">
                        <input type="hidden" name="ModelSS[<?= $data->id ?>][name]" value="<?= $data->name ?>">
                        <input type="hidden" class="status" name="ModelSS[<?= $data->id ?>][status]" value="<?= $data->isActive($model->id) ? '0' : '1' ?>">
                        <input type="hidden" name="ModelSS[<?= $data->id ?>][work_type]" value="0">
                    </td>
                    <td><a href="#" class="service-status"  data-status="<?= $data->isActive($model->id) ? '0' : '1' ?>" title="Отключить"><span class="glyphicon <?= $data->isActive($model->id) ? 'glyphicon-remove': 'glyphicon-ok'  ?>" aria-hidden="true"></span></a></td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
        </tbody>
    </table>
    <label class="control-label">Запчасти для работ</label>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Название</th>
            <th>Цена</th>
            <th class="table-buttons"></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach( $modelSS as $data): ?>
            <?php if($data->work_type): ?>
                <tr class="<?= $data->isActive($model->id) ? 'active_': 'non_active' ?>">
                    <td><?= $data->name ?></td>
                    <td>
                        <input type="text"  class="service-price" <?= $data->isActive($model->id) ? '': 'disabled="disabled"' ?> name="ModelSS[<?= $data->id ?>][price]" value="<?= $data->getPrice($model->id) ?>">
                        <input type="hidden" name="ModelSS[<?= $data->id ?>][name]" value="<?= $data->name ?>">
                        <input type="hidden" class="status" name="ModelSS[<?= $data->id ?>][status]" value="<?= $data->isActive($model->id) ? '0' : '1' ?>">
                        <input type="hidden" name="ModelSS[<?= $data->id ?>][work_type]" value="1">
                    </td>
                    <td><a href="#" class="service-status"  data-status="<?= $data->isActive($model->id) ? '0' : '1' ?>" title="Отключить"><span class="glyphicon <?= $data->isActive($model->id) ? 'glyphicon-remove': 'glyphicon-ok'  ?>" aria-hidden="true"></span></a></td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
        </tbody>
    </table>

    <?= $form->field($model, 'h1')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'translit')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'seo_text')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
