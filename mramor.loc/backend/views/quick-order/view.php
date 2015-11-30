<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\QuickOrder */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Консультации', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quick-order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить этот элемент?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'phone_num',
            'date',
            'email:email',
            'comment:ntext',
        ],
    ]) ?>

</div>
