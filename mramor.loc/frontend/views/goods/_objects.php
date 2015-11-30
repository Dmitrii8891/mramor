<?php
use yii\helpers\Html;
?>
<div class="portfolio-portfolio">
    <div class="portfolio-portfolio-overflow">
        <table class="tov-tb-3" cellspacing="0" cellpadding="0" border="0">
            <tbody>
            <tr>
                <td height="25"><img src="/images/img-kamen/ico-2.jpg" alt=""></td>
                <td height="25"></td><td><a data-toggle="modal"  href="#registrationFormModal" style="margin-left: 11px; font-size: 13px; font-family: arial; color: #6b7b9d; border-bottom: 1px dotted;">Заказать консультацию</a></td>
            </tr>
            </tbody>
        </table>
        <div class="portfolio-portfolio-img-wrap">
            <div class="portfolio-portfolio-img">
                <?=  Html::a(Html::img($model->image),['goods/one-item', 'translit' =>$model->translit ])  ?>
            </div>
        </div>
        <div class="portfolio-portfolio-text-wrap">
            <div class="portfolio-category-name"><?=  Html::a($model->name,['goods/one-item', 'translit' =>$model->translit ])  ?></div>
            <div class="portfolio-item-name"><?=  Html::tag('p',$model->stones?$model->stones->name:'')  ?></div>
            <div class="portfolio-country-name">
                <table class="tov-tb-1" cellspacing="0" cellpadding="0" border="0">
                    <tbody><tr>
                        <td height="20"><?= $model->stones? Html::img($model->stones->country->image):''  ?></td>
                        <td height="20"></td><td><span style="font-size: 13px; font-family: arial; color: #565656; margin-left: 11px;"><?= $model->stones?$model->stones->country->name:''?></span></td>
                    </tr>
                    </tbody></table>
            </div>
            <div class="portfolio-text-name">
                <p>
                    <?= $model->description ?>
                </p>
            </div>
        </div>
    </div>
</div>