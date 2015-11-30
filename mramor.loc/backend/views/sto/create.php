<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Sto */

$this->title = 'Создать СТО';
$this->params['breadcrumbs'][] = ['label' => 'СТО', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
