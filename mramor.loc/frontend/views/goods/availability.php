<?php
use yii\widgets\ListView;
?>

<div class="catalog-izdelij-wrap">
        <?php
        echo ListView::widget( [
            'dataProvider' => $dataProvider,
            'itemView'=>'_availability',
            'summary'=>'',
            'layout' => "<div class='collons-blocks-wrap'>{items}</div><div class='pager-block' id='pager-block-single'>{pager}</div>"
        ] );
        ?>
</div>
