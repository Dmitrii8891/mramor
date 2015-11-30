<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\StoOrder */

$this->title = 'Создать СТО заказ';
$this->params['breadcrumbs'][] = ['label' => 'СТО заказ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sto-order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
