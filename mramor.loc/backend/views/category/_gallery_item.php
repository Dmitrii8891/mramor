<?php
use yii\helpers\Html;

?>
<div class="gallery_image">
    <?= Html::img($item['image'])?>
    <span data-url="<?=$item['image']?>" title="удалить изображение" class="glyphicon glyphicon-trash delete-gallery-item"></span>
</div>