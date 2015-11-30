<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<ul class="filter-box-two">
    <?php foreach($rows as $row): ?>
        <?php $filters = $this->context->filters_param($row->id); ?>
        <?php $link = Url::to(['stone/ajax-filter',$filter=>$filters]); ?>
        <li  onclick="document.location ='<?=$link?>'" >dsfa sdfas
            <?=Html::checkbox('Filter['.$filter.'][]', $this->context->checked( $row->id), ['value' => $row->id,'class'=>'filter-two','id'=>$row->translit])?>
            <label for="<?= $row->translit?>"><a href="<?= $link ?>" ><?= $row->name ?></a></label>
        </li>
    <?php endforeach;?>
</ul>