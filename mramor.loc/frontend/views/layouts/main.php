<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;
use yii\widgets\MyListView;
use yii\widgets\Menu;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use common\models\QuickOrder;
use common\models\DetailsRequest;
use common\models\Subscribe;
use common\components\SiteSearch;
use frontend\components\StaticInfo;
/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <title><?= Html::encode($this->title) ?></title>

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>



    <script type="text/javascript" src="https://vk.com/js/api/openapi.js?116"></script>
</head>
<body>
<?php $this->beginBody() ?>
<div class="modal fade" id="registrationFormModal" tabindex="-1" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Обратный звонок</h4>
            </div>
            <div class="modal-company-forma-wr company-forma-wr">
                <?php $form = ActiveForm::begin(['options' => ['enctype'=> 'multipart/form-data', 'class'=>'form-company-page'], 'action' => '/']); ?>
                <?= $form->field(new QuickOrder(), 'phone_num',[
                    'template' => "{input}\n{hint}\n{error}"
                ])->textInput(['maxlength' => 255, 'placeholder' => 'Телефон','class'=>'text-consult']) ?>

                <?= $form->field(new QuickOrder(), 'email',[
                    'template' => "{input}\n{hint}\n{error}"
                ])->textInput(['maxlength' => 255, 'placeholder' => 'email','class'=>'text-consult']) ?>
                <?= $form->field(new QuickOrder(), 'comment',[
                    'template' => "{input}\n{hint}\n{error}"
                ])->textarea(['rows' => 6,'placeholder' => 'Коментарий','class'=>'text-consult']) ?>
                <input type="submit" class="submit-consult" value="Заказать">
                <?php ActiveForm::end(); ?>
            </div><!-- form -->
        </div>
    </div>
</div>
<div class="modal fade" id="SubscribeFormModal" tabindex="-1" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Подписка</h4>
            </div>
            <div class="modal-company-forma-wr company-forma-wr">
                <?php $form = ActiveForm::begin(['options' => ['enctype'=> 'multipart/form-data', 'class'=>'form-company-page'], 'action' => '/']); ?>

                <?= $form->field(new Subscribe(), 'phone_num',[
                    'options'=>
                        [
                            'tag'=>'div',
                        ],
                    'template' => "{input}"
                ])->textInput(['maxlength' => 255, 'placeholder' => 'Телефон','class'=>'text-consult']) ?>

                <?= $form->field(new Subscribe(), 'email',[
                    'options'=>
                        [
                            'tag'=>'div',
                        ],
                    'template' => "{input}",
                ])->textInput(['maxlength' => 255, 'placeholder' => 'Электронная почта','class'=>'text-consult']) ?>

                <input type="submit" class="submit-consult" value="Отправить">
                <?php ActiveForm::end(); ?>
            </div><!-- form -->
        </div>
    </div>
</div>
<!----------виджет-fb------------->
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.3";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<!----------виджет-fb------------->
<div class="menu-search-wrap-all">
    <div class="menu-search-wrap">
        <div class="mramor-menu">
            <?php
            echo Menu::widget([
                'items' => [
                    ['label' => 'О компании', 'url'=>Url::toRoute('/site/about')],
                    ['label' => 'FAQ', 'url'=>'/page/FAQ'],
                    ['label' => 'Акции','url'=>'/events/index'],
                    ['label' => 'Статьи','url'=>'/articles/index'],
                    ['label' => 'Контакты', 'url'=>Url::toRoute('/site/contact')],
                ],
            ]);
            ?>
        </div>
        <div class="mramor-search-wrap">

            <?= SiteSearch::widget(); ?>

        </div>
    </div>
</div>
<div class="mramor-all-wrap">
    <div class="mramor-wrap">
        <div class="phone-logo-wrap">
            <div class="phone-mramor">
                <div class="phone-mramor-text"><span>044 531-37-36</span></br><a data-toggle="modal"  href="#registrationFormModal">обратный звонок</a></div>
            </div>
            <div class="logo-mramor"><a href="/"><img src="/images/logo.jpg" width="240" height="120" alt="бутик мрамора"/></a></div>
            <div class="room-mramor">
                <div class="room-mramor-text"><a href="/contact">шоу-рум</a></div>
            </div>
        </div>
        <div class="menu-two-wrap">
            <?php
            echo Menu::widget([
                'items' => [
                    ['label' => 'Главная', 'url'=>'/'],
                    ['label' => 'Каталог камня', 'url'=>'/stone/index'],
                    ['label' => 'Наличие на складе','url'=>'/goods/availability'],
                    ['label' => 'Изделия', 'url'=>'/goods/index'],
                    ['label' => 'Услуги', 'url'=>'/standard-services/index'],
                    ['label' => 'Объекты', 'url'=>'/goods/objects'],
                    ['label' => 'Прайс', 'url'=>'/site/price-list', 'options' => ['class'=>'last-child-menu']],
                ],
            ]);
            ?>
        </div>
        <?= $content ?>
    </div>
</div>
<div class="footer-wrap-all">
    <div class="footer-wrap-all-block">
        <div class="footer-left">
            <?= StaticInfo::widget(['page'=>'footer']) ?>
        </div>
        <div class="footer-right">
            <div class="widget-wrapp-all">
                <div class="submint-form">
                        <input id="email-pod" name="email" type="text" placeholder="ваш e-mail"/>
                        <input data-toggle="modal" data-target="#SubscribeFormModal" id="submit-pod" name="submit" type="submit" value="подписаться"/>
                </div>
                <div class="widget-soc">
                    <div class="soc-img">
                        <img  class="vk socseti" src="/images/vk-hover.png" alt="vk.com" id="active-soc"/>
                        <img  class="fb socseti" src="/images/fb.png" alt="fb.com"/>
                        <img class="inst socseti" src="/images/inst.png" alt="instagram.com/"/>
                    </div>
                </div>
                <div class="widget-wrapp-block">
                    <div class="arrow-soc"></div>
                    <div class="widget-vk" style="display: block;">
                        <div id="vk_groups"></div>
                        <script type="text/javascript">
                            VK.Widgets.Group("vk_groups", {mode: 0, width: "280", height: "216", color1: 'FFFFFF', color2: '333333', color3: 'a8adb5'}, 96478335);
                        </script>
                    </div>
                    <div class="widget-fb" style="display: none;">
                        <div class="fb-page" data-href="https://www.facebook.com/butikmramora" style="width: 280px;" data-width="280" data-height="219" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/butikmramora"><a href="https://www.facebook.com/butikmramora">Бутик Мрамора</a></blockquote></div></div>
                    </div>
                    <div class="widget-ins" style="display: none;">
                        <iframe src="http://ejfe.ru/noreg?type=cube&face=&vk=&twit=&insta=butikmramora//&color=FFFFFF&count=12&width=60" frameborder="0" width="290" height="220"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <?php
        echo Menu::widget([
            'options'=>['id'=>'menu-footer'],
            'items' => [
                ['label' => 'Главная', 'url'=>'/'],
                ['label' => 'Каталог камня', 'url'=>'/stone/index'],
                ['label' => 'Наличие на складе','url'=>'/goods/availability'],
                ['label' => 'Изделия', 'url'=>'/goods/index'],
                ['label' => 'Услуги', 'url'=>'/services/index'],
                ['label' => 'Объекты', 'url'=>'/goods/objects'],
                ['label' => 'Прайс', 'url'=>'/site/price-list', 'options' => ['class'=>'last-child-menu']],
            ],
        ]);
        ?>
    </div>
</div>
<div class="artweb">
    <div class="artweb-wr">
        <div class="artweb-left">© 2015 Бутик Мрамора. Все права защищены. </div>
        <div class="artweb-right">
            <a href="http://artweb.ua/"><img src="/images/artweb_logo.png" width="58" height="17"></a>
            <a href="http://artweb.ua/">Создание сайтов</a>
        </div>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>