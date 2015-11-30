<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Stone */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Камни', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="content-content">
    <div class="tovar-mramor-see-wrap">
        <div class="tovar-mramor-see-img-text">
            <div class="tovar-mramor-see-img"><img src="<?= $model->image?>"/></div>
            <div class="tovar-mramor-see-slide">
                <div class="tovar-mramor-see-slide-img-big">
                    <img src="<?php $img = $model->getGallery(); echo $img[0]; ?>" alt=""/>
                </div>
                <div class="tovar-mramor-see-slide-img-min">
                    <?php
                    foreach($model->getGallery() as $image):
                        ?>
                        <img src="<?= $model->minImg($image, 44,44); ?>" alt=""/>
                    <?php endforeach; ?>
                </div>
            </div>
            <script>
                $('.tovar-mramor-see-slide-img-min').delegate('img','click', function(){
                    $('.tovar-mramor-see-slide-img-big img').attr('src',$(this).attr('src').replace('44X44','224X189'));
                });
            </script>
        </div>
        <div class="tovar-mramor-see-text">
            <div class="tovar-mramor-title"><?= $model->filter_one ?><span><?= $model->name?></span></div>
            <div class="tovar-mramor-see-table" style="margin-top: 20px;">
                <table class="tov-tb-2" cellspacing="0" cellpadding="0" border="0" style="margin-top: 20px;">
                    <tr>
                        <td height="25"><img src="/images/img-kamen/ico-2.jpg" alt=""/></td>
                        <td height="25"><td><a href="#" style="margin-left: 11px; font-size: 13px; font-family: arial; color: #6b7b9d; border-bottom: 1px dotted;">Заказать консультацию</a></td>
                    </tr>
                </table>
            </div>
            <div class="tovar-mramor-see-text-p">
                <?= $model->description ?>
            </div>
        </div>
    </div>
</div>