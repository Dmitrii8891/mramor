<?php
/* @var $content string */
$this->beginContent('@app/views/layouts/main.php');

?>
    <div class="portfolio-wrap-all">
        <div class="portfolio-wrap">
            <?= $content ?>
            <div class='portfolio-block-right with_absolute_position'>
                <div class='slider-right'>
                    <div class='slider-right-img-1'><p>Мраморные<br>лестницы<br><span>Широкий диапазон цветов и<br>оттенков, богатейшая палитра<br>рисунков</span></p></div>
                    <div class='slider-right-img-2'><p>шоу-рум</p></div>
                </div>
            </div>
            <div class="our-services-wrap" style="margin-top: -70px;">
                <div class="our-services-text">
                    <p>Наши услуги</p>
                    <img src="/images/line-2.png">
                </div>
                <div class="our-services-img-wrap">
                    <div class="our-services-block-1">
                        <img src="/images/service-1.jpg" width="480" height="320">
                        <div class="services-block-text-wrap"></div>
                        <div class="services-block-text">
                            <p>Индивидуальный<br>дизайн</p>
                        </div>
                    </div>
                    <div class="our-services-block-2">
                        <div class="our-services-block-2_1">
                            <div class="our-services-block-text">Монтаж<br>готовых изделий</div>
                            <img src="/images/line-circle.png" width="117" height="15">
                        </div>
                        <div class="our-services-block-2_2">
                            <div class="our-services-block-text">Гидроабразивная<br>резка</div>
                            <img src="/images/line-circle.png" width="117" height="15">
                        </div>
                        <div class="our-services-block-2_3">
                            <div class="our-services-block-text">Полировка<br>и реставрация</div>
                            <img src="/images/line-circle.png" width="117" height="15">
                        </div>
                        <div class="our-services-block-2_4">
                            <div class="our-services-block-text">Изготовление<br>изделий</div>
                            <img src="/images/line-circle.png" width="117" height="15">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php $this->endContent() ?>