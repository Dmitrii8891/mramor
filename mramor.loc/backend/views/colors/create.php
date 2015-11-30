<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Colors */

$this->title = 'Create Цвета';
$this->params['breadcrumbs'][] = ['label' => 'Цвета', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="colors-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
