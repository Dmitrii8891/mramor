<?php
use yii\widgets\ListView;
use yii\widgets\MyListView;
use yii\widgets\Menu;
use yii\helpers\Html;
use \yii\base\Controller;
$this->title = 'Главная';

$this->registerMetaTag(['name' => 'description', 'content' => '']);
$this->registerCssFile('@web/css/jquery.mCustomScrollbar.css');
$this->registerJsFile('@web/js/html5.js');
$this->registerJsFile('@web/js/css3-mediaqueries.js');
$this->registerJsFile('@web/js/jquery.mCustomScrollbar.concat.min.js');
?>
<div class="slider-wrap-all">
    <div class="slider-left-wrap">
        <div class="slider-left">
            <?=$this->render('@app/views/site/_slider', [
            'dataEventProvider'=>$dataEventProvider
            ]);?>
        </div>
    </div>
    <div class="slider-right">
        <a href="/goods/view/lestnicy"><div class='slider-right-img-1'><p>Мраморные<br>лестницы<br><span>Широкий диапазон цветов и<br>оттенков, богатейшая палитра<br>рисунков</span></p></div></a>
        <a href="/contact"><div class='slider-right-img-2'><p>шоу-рум</p></div></a>
    </div>
</div>
<div class="block-min-wrap-all">
    <?php
    echo MyListView::widget( [
        'dataProvider' => $dataGoodsProvider,
        'itemView'=>'@app/views/goods/_goods_category_list',
        'summary'=>'',
    ] );
    ?>

</div>
<div class="menu-color-wrap-all">
    <div id="select_type" class="menu-color-ul">
        <?=$this->render('_index_filter_stone', [
            'rows'=>$stonesData
        ]);?>

    </div>
    <div class="color-wrap">
        <div id="select_color" class="color-wrap-menu">
            <?=$this->render('_index_filter_color', [
                'rows'=>$colorsData
            ]);?>
        </div>
        <div class="color-slider">
            <div class="scroll-pane">
                <div id="demo">
                    <section id="examples" class="snap-scrolling-example">
                        <div id="content-1" class="content horizontal-images">
                    <?php
                        echo MyListView::widget( [
                            'dataProvider' => $dataProvider,
                            'itemView'=>'@app/views/site/_stone_list',
                            'summary'=>'',
                            'options'=>
                            [
                                'tag'=>'ul'
                            ]
                        ] );
                    ?>
                        </div>
                     </section>
                 </div>
            </div>
        </div>
    </div>
</div>
<div class="our-services-wrap">
    <div class="our-services-text">
        <p>Наши услуги</p>
        <img src="/images/line-2.png" />
    </div>
    <div class="our-services-img-wrap">
        <div class="our-services-block-1">
            <img src="/images/service-1.jpg" width="480" height="320" >
            <div class="services-block-text-wrap"></div>
            <div class="services-block-text">
                <p>Индивидуальный</br>дизайн</p>
            </div>
        </div>
        <div class="our-services-block-2">
            <div class="our-services-block-2_1">
                <div class="our-services-block-text">Монтаж</br>готовых изделий</div>
                <img src="/images/line-circle.png" width="117" height="15" />
            </div>
            <div class="our-services-block-2_2">
                <div class="our-services-block-text">Гидроабразивная</br>резка</div>
                <img src="/images/line-circle.png" width="117" height="15" />
            </div>
            <div class="our-services-block-2_3">
                <div class="our-services-block-text">Полировка</br>и реставрация</div>
                <img src="/images/line-circle.png" width="117" height="15" />
            </div>
            <div class="our-services-block-2_4">
                <div class="our-services-block-text">Изготовление</br>изделий</div>
                <img src="/images/line-circle.png" width="117" height="15" />
            </div>
        </div>
    </div>
</div>
<div class="why-700">
    <p>почему нам доверяют более 700 клиентов</p>
    <img src="/images/line-3.png">
</div>
<div class="contacts-our-pre-wrap">
    <div class="contacts-our-pre"><img src="/images/contacts-our-1.jpg" alt=""/>
        <p>Индивидуальный</br>подход</p>
    </div>
    <div class="contacts-our-pre"><img src="/images/contacts-our-2.jpg" alt=""/>
        <p>Шоу-рум</p>
    </div>
    <div class="contacts-our-pre"><img src="/images/contacts-our-3.jpg" alt=""/>
        <p>Лучшие сорта камня</p>
    </div>
    <div class="contacts-our-pre"><img src="/images/contacts-our-4.jpg" alt=""/>
        <p>Персональный</br>дизайн изделий</p>
    </div>
</div>