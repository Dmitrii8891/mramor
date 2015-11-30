<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<ul class="filter-box-two">
    <?php foreach($rows as $row): ?>
        <?php $filters = $this->filters_param($row->id); ?>
        <?php $link = Url::to(['products/index','filters'=>$filters]); ?>
        <li>
            <a href="<?= $link ?>">
                <?=Html::checkbox($filter.'[]', $this->cheched( $row->translit), ['value' => $row->translit]).' ' .$row->name ?>
            </a>
        </li>
    <?php endforeach;?>
</ul>

