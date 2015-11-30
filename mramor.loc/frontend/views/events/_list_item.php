<?php
use yii\helpers\Html;
?>
<div class="portfolio-portfolio event-portfolio">
    <div class="portfolio-portfolio-overflow">
        <?=  Html::a(Html::img($model->cover),['events/view', 'translit' =>$model->translit ])  ?>
    </div>
</div>