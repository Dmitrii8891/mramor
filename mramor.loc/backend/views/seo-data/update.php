<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SeoData */

$this->title = 'Update Seo Data: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Seo Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="seo-data-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
