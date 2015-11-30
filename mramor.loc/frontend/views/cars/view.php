<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;
use yii\widgets\ActiveForm;
use common\models\Callback;
/* @var $this yii\web\View */
/* @var $model backend\models\Items */
$this->title = $model->brand;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="items-index index_item_page">
    <div class="car_head">
        <?= Html::img($model->picture) ?>
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?php $form = ActiveForm::begin(['options' => ['enctype'=> 'multipart/form-data'], 'action' => '/cars/to-order']); ?>

    <div class="modal fade" id="ToOrderForm" tabindex="-1" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Заказ СТО</h4>
                </div>
                <div class="form">

                    <?= $form->field(new Callback(), 'name')->textInput(['maxlength' => 255]) ?>

                    <?= $form->field(new Callback(), 'phone_num')->textInput(['maxlength' => 255]) ?>

                    <input type="submit" class="yellow_button" value="Заказать">

                </div><!-- form -->
            </div>
        </div>
    </div>

    <div class="table_block"  id="STO-order">
        <label class="control-label">Работы и цены:</label>
        <div class="full-price">
            <p>Всего за заказ <span class="total_price">0</span> грн</p>
        </div>
        <table>
            <tbody>
            <?php foreach( $services as $data): ?>
                <?php if(!$data->work_type): ?>
                    <tr>
                        <td>
                            <input type="checkbox" name="sto_service[]" value="<?= $data->id ?>">
                        </td>
                        <td class="name"><?= $data->name ?></td>
                        <td class="price"><?= $data->price ?></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
            </tbody>
        </table>
        <label class="control-label">Запчасти для работ:</label>
        <table>
            <tbody>
            <?php foreach( $services as $data): ?>
                <?php if($data->work_type): ?>
                    <tr>
                        <td>
                            <input type="checkbox" name="sto_service[]" value="<?= $data->id ?>">
                        </td>
                        <td class="name"><?= $data->name ?></td>
                        <td class="price"><?= $data->price ?></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <a href="#ToOrderForm" class="yellow_button middle" data-toggle = 'modal' >Заказать</a>
    <?php ActiveForm::end(); ?>

    <div>
        <?= $model->sto_text ?>
    </div>


</div>
