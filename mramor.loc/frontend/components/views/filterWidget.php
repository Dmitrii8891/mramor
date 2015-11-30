<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<ul class="filter-box-two">
    <?php foreach($rows as $row): ?>
        <?php $link = $this->context->getUrlTo($row->translit);
        ?>
        <li>
            <?=Html::checkbox($filter.'[]', $this->context->checked( $row->translit), ['value' => $row->translit,'class'=>'filter-two','id'=>$row->translit])?>
            <label  onclick="document.location ='<?=$link?>'"  for="<?= $row->translit?>"><a href="<?= $link ?>"><?= $row->name ?></a></label>
        </li>
    <?php endforeach;?>
</ul>