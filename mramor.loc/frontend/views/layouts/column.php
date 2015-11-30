<?php
use frontend\models\Cars;
use frontend\models\WorkType;
use frontend\models\Items;
use common\models\QuickOrder;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use backend\models\Colors;
use backend\models\Country;
use backend\models\TypeOfStone;

use app\components\FiltersWidget;

/* @var $content string */
$this->beginContent('@app/views/layouts/main.php');

?>
    <div class="wrap-cont">
        <div class="side-bar-left-wrap">
            <form id="stone-filter-form">
                <div class="filter-wrap">
                    <div class="title-filter">Ассортимент:</div>
                    <?= FiltersWidget::widget(['data'=>TypeOfStone::find()->all(), 'filter'=>'assortment']) ?>
                </div>
                <div class="filter-wrap">
                    <div class="title-filter">Цветовая гамма:</div>
                    <?= FiltersWidget::widget(['data'=>Colors::find()->all(), 'filter'=>'color']) ?>
                </div>
                <div class="filter-wrap">
                    <div class="title-filter">Страна производитель:</div>
                    <?= FiltersWidget::widget(['data'=>Country::find()->all(), 'filter'=>'country']) ?>
                </div>
            </form>
        </div>


        <div class="content-wrap">
            <div class="content-breadcrumbs">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
            </div>
            <?= $content ?>
        </div>
    </div>
<?php $this->endContent() ?>