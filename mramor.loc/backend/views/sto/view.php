<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Sto */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'СТО', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверенны что хотите удалить этот элемент?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'text:html',
            'h1',
            'description',
            'title',
            'translit',
            'seo_text:ntext',
        ],
    ]) ?>

</div>
