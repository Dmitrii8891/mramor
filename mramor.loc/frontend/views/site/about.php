<?php
use yii\helpers\Url;
use yii\widgets\MyListView;
use yii\widgets\ActiveForm;
use common\models\Subscribe;
use frontend\components\StaticInfo;
?>
<div class="company-wrap-all">
    <div class="company-wrap">
        <!----slider-company---->
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
        <!----end-slider-company---->
        <div class="history-wrap">
            <div class="our-services-text our-contacts">
                <p>История и современность</p>
                <img src="/images/line-5.png">
            </div>
            <div class="contacts-texts">
                <p>
                    <?= StaticInfo::widget(['page'=>'about-history']) ?>
                </p>
            </div>
        </div>
        <div class="history-wrap">
            <div class="our-contacts-text">
                <p>Планы на будущее</p>
                <img src="/images/line-5.png">
            </div>
            <div class="contacts-texts">
                <p>
                    <?= StaticInfo::widget(['page'=>'about-future']) ?>
                </p>
            </div>
        </div>
        <div class="history-wrap">
            <div class="our-contacts-text">
                <p>Кто наши клиенты</p>
                <img src="/images/line-5.png">
            </div>
            <div class="icons-contacts-wrap-all">
                <div class="icons-contacts-wrap">
                    <div class="icons-contacts-img">
                        <img src="/images/contacts-ico-1.jpg"/>
                    </div>
                    <p>Дизайнеры</br>фрилансеры</p>
                </div>
                <div class="icons-contacts-wrap">
                    <div class="icons-contacts-img">
                        <img src="/images/contacts-ico-2.jpg"/>
                    </div>
                    <p>Строительные</br>организации</p>
                </div>
                <div class="icons-contacts-wrap">
                    <div class="icons-contacts-img">
                        <img src="/images/contacts-ico-3.jpg"/>
                    </div>
                    <p>Дизайнерские</br>фирмы</p>
                </div>
                <div class="icons-contacts-wrap">
                    <div class="icons-contacts-img">
                        <img src="/images/contacts-ico-4.jpg"/>
                    </div>
                    <p>Архитекторы</p>
                </div>
                <div class="icons-contacts-wrap">
                    <div class="icons-contacts-img">
                        <img src="/images/contacts-ico-5.jpg"/>
                    </div>
                    <p>Частные лица</p>
                </div>
            </div>
        </div>
        <div class="history-wrap">
            <div class="our-contacts-text">
                <p>Мрамор в нашем бутике завозится из 10 стран мира</p>
                <img src="/images/line-6.png">
            </div>
            <div class="flags-contacts-wrap-all">
                <div class="flags-contacts-wrap">
                    <img src="/images/flag-1.jpg" />
                    <p>Греция</p>
                </div>
                <div class="flags-contacts-wrap">
                    <img src="/images/flag-2.jpg" />
                    <p>Италия</p>
                </div>
                <div class="flags-contacts-wrap">
                    <img src="/images/flag-3.jpg" />
                    <p>Турция</p>
                </div>
                <div class="flags-contacts-wrap">
                    <img src="/images/flag-4.jpg" />
                    <p>Норвегия</p>
                </div>
                <div class="flags-contacts-wrap">
                    <img src="/images/flag-5.jpg" />
                    <p>Индия</p>
                </div>
                <div class="flags-contacts-wrap">
                    <img src="/images/flag-6.jpg" />
                    <p>Египет</p>
                </div>
                <div class="flags-contacts-wrap">
                    <img src="/images/flag-7.jpg" />
                    <p>Оман</p>
                </div>
                <div class="flags-contacts-wrap">
                    <img src="/images/flag-8.jpg" />
                    <p>Португалия</p>
                </div>
                <div class="flags-contacts-wrap">
                    <img src="/images/flag-9.jpg" />
                    <p>Франция</p>
                </div>
                <div class="flags-contacts-wrap">
                    <img src="/images/flag-10.jpg" />
                    <p>Испания</p>
                </div>
            </div>
        </div>
        <div class="history-wrap">
            <div class="our-contacts-text">
                <p>Схема работы</p>
                <img src="/images/line-7.png">
            </div>
            <div class="circle-wrapper-all" id="circle-wrapper-all-1">
                <div class="circle-wrapper">
                    <img class="company-rotate" src="/images/contacts-circl-1.png" alt=""/>
                    <img class="company-circle-hover" src="/images/contacts-circl-hover.png" alt=""/>
                    <p>
                        Вы оставляете</br>
                        заявку на сайте
                    </p>
                </div>
                <div class="circle-wrapper">
                    <img class="company-rotate" src="/images/contacts-circl-2.png" alt=""/>
                    <img class="company-circle-hover" src="/images/contacts-circl-hover.png" alt=""/>
                    <p>Наш менеджер</br>
                        связывается с вами</p>
                </div>
                <div class="circle-wrapper">
                    <img class="company-rotate" src="/images/contacts-circl-3.png" alt=""/>
                    <img class="company-circle-hover" src="/images/contacts-circl-hover.png" alt=""/>
                    <p>Приглашение в</br>
                        шоу-рум</p>
                </div>
                <div class="circle-wrapper">
                    <img class="company-rotate" src="/images/contacts-circl-4.png" alt=""/>
                    <img class="company-circle-hover" src="/images/contacts-circl-hover.png" alt=""/>
                    <p>Отбор камня</p>
                </div>
                <div class="circle-wrapper">
                    <img class="company-rotate" src="/images/contacts-circl-5.png" alt=""/>
                    <img class="company-circle-hover" src="/images/contacts-circl-hover.png" alt=""/>
                    <p>Чертеж изделия</p>
                </div>
            </div>
            <div class="circle-wrapper-all"  id="circle-wrapper-all-2">
                <div class="circle-wrapper">
                    <img class="company-rotate" src="/images/contacts-circl-6.png" alt=""/>
                    <img class="company-circle-hover" src="/images/contacts-circl-hover.png" alt=""/>
                    <p>
                        Обсуждение
                    </p>
                </div>
                <div class="circle-wrapper">
                    <img class="company-rotate" src="/images/contacts-circl-7.png" alt=""/>
                    <img class="company-circle-hover" src="/images/contacts-circl-hover.png" alt=""/>
                    <p> Просчет</br>
                        стоимости</p>
                </div>
                <div class="circle-wrapper">
                    <img class="company-rotate" src="/images/contacts-circl-8.png" alt=""/>
                    <img class="company-circle-hover" src="/images/contacts-circl-hover.png" alt=""/>
                    <p>Коммерческое</br>
                        предложение</p>
                </div>
                <div class="circle-wrapper">
                    <img class="company-rotate" src="/images/contacts-circl-9.png" alt=""/>
                    <img class="company-circle-hover" src="/images/contacts-circl-hover.png" alt=""/>
                    <p>Договор</p>
                </div>
                <div class="circle-wrapper">
                    <img class="company-rotate" src="/images/contacts-circl-10.png" alt=""/>
                    <img class="company-circle-hover" src="/images/contacts-circl-hover.png" alt=""/>
                    <p>Отгрузка монтаж и</br>
                        установка изделия</p>
                </div>
            </div>
        </div>
        <div class="history-wrap">
            <div class="our-contacts-text">
                <p>Наши преимущества</p>
                <img src="/images/line-8.png">
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
        </div>
    </div>
</div>
<div class="company-wrap-all-two">
    <div class="company-wrap-two">
        <div class="company-wrap">
            <div class="company-two-text"><p>Как мы работаем</p></div>
        </div>
        <div class="grafick-rabotu-wrap">
            <div class="contacts-graph" style="margin-bottom: 20px;">
                <div class="contacts-graph-l">
                    <div class="contacts-graph-l-block">Пн.</div>
                    <div class="contacts-graph-l-block">Вт.</div>
                    <div class="contacts-graph-l-block">Ср.</div>
                    <div class="contacts-graph-l-block">Чт.</div>
                    <div class="contacts-graph-l-block">Пт.</div>
                    <p>С 10 до 18 часов</p>
                </div>
                <div class="contacts-graph-r">
                    <div class="contacts-graph-r-block">Сб.</div>
                    <div class="contacts-graph-r-block">Вс.</div>
                    <p><img style="float: left; margin-left: 24px" src="/images/krestik.png" alt=""><img style="float: right; margin-right: 24px" src="/images/krestik.png" alt=""></p>
                </div>
            </div>
        </div>
        <div class="grafick-rabotu-wrap">
            <div class="contacts-graph">
                <div class="contacts-graph-l">
                    <div class="contacts-graph-l-block">Пн.</div>
                    <div class="contacts-graph-l-block">Вт.</div>
                    <div class="contacts-graph-l-block">Ср.</div>
                    <div class="contacts-graph-l-block">Чт.</div>
                    <div class="contacts-graph-l-block">Пт.</div>
                    <p id="contacts-road">Выезд на объект в удобное время</p>
                </div>
                <div class="contacts-graph-r">
                    <div class="contacts-graph-r-block">Сб.</div>
                    <div class="contacts-graph-r-block">Вс.</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="company-wrap-all">
    <div class="company-wrap">
        <div class="company-form-wrapp-all">
            <div class="company-form-wrapp-text">
                <p>Хотите узнавать о свежих акция распродажах первыми? <a href="#">Подписывайтесь на рассылку</a></p>
            </div>
        </div>
        <div class="company-forma-all">
            <div class="company-forma-wr">
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
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        /*
         $('.carousel').carousel({
         interval:false
         });
         */

        $('.circle-wrapper').hover(function() {
                $(this).find( '.company-circle-hover').css({opacity: 100, transition:'0.3s'});
                $(this).find( '.company-rotate').css({animationName: 'anim_circle',
                    animationDuration: '0.75s',
                    animationTimingFunction: 'linear',
                    animationIterationCount: 1,
                    animationPlayState: 'running'
                }).delay(750).queue(function () { $(this).css({animationName: 'none'}); $(this).dequeue();});
            },
            function(){
                $(this).find('.company-circle-hover').css({opacity: 0, transition:'0.3s'});


            });

        /*
         var jVal = {
         'fullName' : function() {
         $('body').append('<div id="nameInfo" class="info"></div>');
         var nameInfo = $('#nameInfo');
         var ele = $('#fullname');
         var pos = ele.offset();
         nameInfo.css({
         top: -7,
         left: 22
         });
         var patt = /[0-9]/;
         if(!patt.test(ele.val())) {
         jVal.errors = true;
         nameInfo.removeClass('correct').addClass('error').html('').show();
         ele.removeClass('normal').addClass('wrong');
         } else {
         nameInfo.removeClass('error').addClass('correct').html('').show();
         ele.removeClass('wrong').addClass('normal');
         }
         },
         'email' : function() {
         $('body').append('<div id="emailInfo" class="info"></div>');
         var emailInfo = $('#emailInfo');
         var ele = $('#email');
         var pos = ele.offset();
         emailInfo.css({
         top: -7,
         left: 22
         });
         var patt = /^.+@.+[.].{2,}$/i;
         if(!patt.test(ele.val())) {
         jVal.errors = true;
         emailInfo.removeClass('correct').addClass('error').html('').show();
         ele.removeClass('normal').addClass('wrong');
         } else {
         emailInfo.removeClass('error').addClass('correct').html('').show();
         ele.removeClass('wrong').addClass('normal');
         }
         },
         'sendIt' : function (){
         if(!jVal.errors) {
         $('#jform').submit();
         }
         }
         };
         // ====================================================== //
         $('#send').click(function (){
         var obj = $.browser.webkit ? $('body') : $('html');
         obj.animate({ scrollTop: $('#jform').offset().top -160 }, 450, function (){
         jVal.errors = false;
         jVal.fullName();
         jVal.email();
         jVal.sendIt();
         });
         return false;
         });
         $('#fullname').change(jVal.fullName);
         $('#email').change(jVal.email);
         */
    });
</script>