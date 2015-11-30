<?php

use yii\helpers\Html;
use yii\widgets\MyListView;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Stone */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Камни', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

    <div class="tovar-mramor-see-wrap">
        <div class="tovar-mramor-see-img-text">
            <div class="tovar-mramor-see-img"><img src="<?= $model->image?>"/></div>
            <div class="tovar-mramor-see-slide">

                <?=$this->render('_image_gallery', [
                    'model'=>$model
                ]);?>

            </div>
            <script>
                $('.tovar-mramor-see-slide-img-min').delegate('img','click', function(){
                    $('.tovar-mramor-see-slide-img-big img').attr('src',$(this).attr('src').replace('44X44','224X189'));
                });
            </script>
        </div>
        <div class="tovar-mramor-see-text">
            <div class="tovar-mramor-title"><?= $model->type->name ?> <span><?= $model->name?></span></div>
            <div class="tovar-mramor-see-table" style="margin-top: 20px;">
                <table class="tov-tb-1" cellspacing="0" cellpadding="0" border="0">
                    <tr>
                        <td height="20"><?= Html::img($model->country->image) ?></td>
                        <td height="20"><td><span style="font-size: 13px; font-family: arial; color: #565656; margin-left: 11px;"><?= $model->country->name?></span></td>
                    </tr>
                </table>
                <table class="tov-tb-2" cellspacing="0" cellpadding="0" border="0" style="margin-top: 20px;">
                    <tr>
                        <td height="25"><img src="/images/img-kamen/ico-2.jpg" alt=""/></td>
                        <td height="25"><td><a data-toggle="modal"  href="#registrationFormModal" style="margin-left: 11px; font-size: 13px; font-family: arial; color: #6b7b9d; border-bottom: 1px dotted;">Заказать консультацию</a></td>
                    </tr>
                </table>
            </div>
            <div class="tovar-mramor-see-text-p">
                <?= $model->description ?>
            </div>
        </div>
    </div>
