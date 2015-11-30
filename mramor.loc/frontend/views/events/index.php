<?php
use yii\widgets\ListView;
?>

<?php
    echo ListView::widget( [
        'dataProvider' => $dataProvider,
        'itemView'=>'_list_item',
        'summary'=>'',
        'layout' => "<div class='collons-blocks-wrap with_min_height'>{items}</div>
        <div class='pager-block' id='pager-block-single'>{pager}</div>"
    ] );
?>
