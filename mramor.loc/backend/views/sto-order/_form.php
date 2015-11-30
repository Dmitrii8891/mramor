<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\StoOrder */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sto-order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'phone_num')->textInput(['maxlength' => 255]) ?>
    <ol>
    <?php foreach($model->getServices() as $services):?>
        <li><?= $services->name ?></li>
    <?php endforeach; ?>
    </ol>

    <?= $form->field($model, 'date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>