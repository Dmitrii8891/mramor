<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TypesOfProducts */

$this->title = 'Create Types Of Products';
$this->params['breadcrumbs'][] = ['label' => 'Types Of Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="types-of-products-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
