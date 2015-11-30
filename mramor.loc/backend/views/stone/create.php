<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Stone */

$this->title = 'Create Stone';
$this->params['breadcrumbs'][] = ['label' => 'Камень', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stone-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
