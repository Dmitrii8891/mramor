<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Stone */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Камень', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="stone-view">

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
            'name',
            'filter_one',
            'filter_two',
            'filter_three',
            'description:ntext',
        ],
    ]) ?>

</div>
