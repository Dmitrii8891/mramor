<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\QuickOrder */

$this->title = 'Create Quick Order';
$this->params['breadcrumbs'][] = ['label' => 'Консультации', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quick-order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
