<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Stone */

$this->title = 'Update Stone: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Камень', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновление';
?>
<div class="stone-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
