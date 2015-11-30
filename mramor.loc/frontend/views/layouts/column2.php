<?php
use frontend\models\Cars;
use frontend\models\WorkType;
use frontend\models\Items;
use frontend\models\SendForm;
use yii\widgets\ActiveForm;
use common\models\QuickOrder;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
/* @var $content string */
$this->beginContent('@app/views/layouts/main.php');

?>
    <div class="wrap-cont">
        <div class="side-bar-left-wrap">
            <div class="slider-right">
                <a href="/goods/view/lestnicy"><div class='slider-right-img-1'><p>Мраморные<br>лестницы<br><span>Широкий диапазон цветов и<br>оттенков, богатейшая палитра<br>рисунков</span></p></div></a>
                <a href="/contact"><div class='slider-right-img-2'><p>шоу-рум</p></div></a>
            </div>
        </div>
        <div class="content-wrap">
            <div class="content-breadcrumbs">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
            </div>
            <div class="content-content" id="content-faq">
                <?= $content ?>
            </div>

        </div>

        <script>
            $(document).ready(function() {

                $("a.ancLinks").click(function () {
                    var elementClick = $(this).attr("href");

                    var destination = $(elementClick).offset().top -33;

                    if ($.browser.safari) {
                        $('body').animate({scrollTop: destination}, 670);
                    } else {
                        $('body').animate({scrollTop: destination}, 670);
                    }
                    return false;
                });
            });
        </script>
    </div>
<?php $this->endContent() ?>