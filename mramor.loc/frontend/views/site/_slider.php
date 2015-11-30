<?php
use yii\helpers\Html;
?>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">


    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

        <?php $i=0;
        foreach($dataEventProvider->getModels() as $row):?>
            <div class="item <?= !$i++?'active':''?>">
                <?=  Html::a(Html::img($row->cover),['events/view', 'translit' =>$row->translit ])  ?>
                <div class="carousel-caption">
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- Indicators -->

    <ol class="carousel-indicators">
        <?php for($k=0; $k<$i; $k++):?>
            <li data-target="#carousel-example-generic" data-slide-to="<?= $k ?>" class="<?= !$k?'active':''?>"></li>
        <?php endfor;?>

    </ol>
    <!-- Controls -->
    <a class="arrow-left left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <img src="/images/arrow-l.png" width="52" height="74"/>
    </a>
    <a class="arrow-right right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <img src="/images/arrow-r.png" width="52" height="74"/>
    </a>
</div>