<?php
use yii\widgets\ListView;
?>

<?php
    echo ListView::widget( [
        'dataProvider' => $dataProvider,
        'itemView'=>'_objects',
        'summary'=>'',
        'layout' => "<div class='portfolio-block-left'>{items}</div>
        <div class='pager-block' id='pager-block-single'>{pager}</div>"
] );
?>