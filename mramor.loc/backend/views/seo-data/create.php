<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SeoData */

$this->title = 'Create Seo Data';
$this->params['breadcrumbs'][] = ['label' => 'Seo Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seo-data-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
