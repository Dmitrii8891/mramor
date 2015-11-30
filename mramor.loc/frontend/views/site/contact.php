<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use common\models\DetailsRequest;
use frontend\components\StaticInfo;
?>
<div class="contacts-wrap-all">
    <div class="contacts-wrap">
        <div class="contacts-text-img">
            <?= StaticInfo::widget(['page'=>'contact']) ?>
        </div>
        <div class="contacts-graph-form">
            <div class="contacts-graph-wrap">
                <div class="contacts-how-work">Как мы работаем</div>
                <div class="contacts-graph">
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
                        <p><img style="float: left; margin-left: 24px" src="/images/krestik.png" alt=""/><img style="float: right; margin-right: 24px" src="/images/krestik.png" alt=""/></p>
                    </div>
                </div>
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
                <div class="contacts-mapa">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2539.1958270721966!2d30.510185000000003!3d50.47469799999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4ce11f6d3c723%3A0x93782d2b2a9d382a!2z0LLRg9C7LiDQntCx0L7Qu9C-0L3RgdGM0LrQsCwgNDcsINCa0LjRl9Cy!5e0!3m2!1sru!2sua!4v1435930106075" width="420" height="290" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
            <div class="contacts-form">
                <div class="contacts-form-title">Склад и выставочный зал:</div>
                <div class="contacts-form-streat">Киев, ул. Набережно-Луговая, 2. Территория складов Речпорта</div>
                <div class="contacts-form-inform">Для уточнения информации заполните нижеприведенную форму:</div>
                <?php $form = ActiveForm::begin(['options' => ['enctype'=> 'multipart/form-data', 'class'=>'form-contacts-page'], 'action' => '/']); ?>
                <?= $form->field(new DetailsRequest(), 'name',[
                    'options'=>
                    [
                        'tag'=>'div',
                    ],
                    'template' => "{input}"
                ])->textInput(['maxlength' => 255, 'placeholder' => 'Имя','class'=>'text-consult']) ?>

                <?= $form->field(new DetailsRequest(), 'email',[
                    'options'=>
                    [
                        'tag'=>'div',
                    ],
                    'template' => "{input}",
                ])->textInput(['maxlength' => 255, 'placeholder' => 'Электронная почта','class'=>'text-consult']) ?>

                <?= $form->field(new DetailsRequest(), 'phone_number',[
                    'options'=>
                    [
                        'tag'=>'div',
                    ],
                    'template' => "{input}"
                ])->textInput(['maxlength' => 255, 'placeholder' => 'Телефон','class'=>'text-consult']) ?>

                <?= $form->field(new DetailsRequest(), 'city',[
                    'options'=>
                        [
                            'tag'=>'div',
                        ],
                    'template' => "{input}"
                ])->textInput(['maxlength' => 255, 'placeholder' => 'Город','class'=>'text-consult']) ?>

                <?= $form->field(new DetailsRequest(), 'comment',[
                    'options'=>
                        [
                            'tag'=>'div',
                        ],
                    'template' => "{input}"
                ])->textarea(['rows' => 6,'placeholder' => 'Коментарий','class'=>'area-consult area-contacts']) ?>

                <input type="submit" class="submit-consult" value="Отправить">
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
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
            'about' : function() {
                $('body').append('<div id="aboutInfo" class="info"></div>');
                var aboutInfo = $('#aboutInfo');
                var ele = $('#about');
                var pos = ele.offset();
                aboutInfo.css({
                    top: -7,
                    left: 22
                });
                if(ele.val().length < 5) {
                    jVal.errors = true;
                    aboutInfo.removeClass('correct').addClass('error').html('').show();
                    ele.removeClass('normal').addClass('wrong').css({'font-weight': 'normal'});
                } else {
                    aboutInfo.removeClass('error').addClass('correct').html('').show();
                    ele.removeClass('wrong').addClass('normal');
                }
            },
            'name' : function() {
                $('body').append('<div id="aboutInfo" class="info"></div>');
                var aboutInfo = $('#name-Info');
                var ele = $('#name');
                var pos = ele.offset();
                aboutInfo.css({
                    top: -7,
                    left: 22
                });
                if(ele.val().length < 2) {
                    jVal.errors = true;
                    aboutInfo.removeClass('correct').addClass('error').html('').show();
                    ele.removeClass('normal').addClass('wrong').css({'font-weight': 'normal'});
                } else {
                    aboutInfo.removeClass('error').addClass('correct').html('').show();
                    ele.removeClass('wrong').addClass('normal');
                }
            },
            'city' : function() {
                $('body').append('<div id="aboutInfo" class="info"></div>');
                var aboutInfo = $('#cityInfo');
                var ele = $('#city');
                var pos = ele.offset();
                aboutInfo.css({
                    top: -7,
                    left: 22
                });
                if(ele.val().length < 2) {
                    jVal.errors = true;
                    aboutInfo.removeClass('correct').addClass('error').html('').show();
                    ele.removeClass('normal').addClass('wrong').css({'font-weight': 'normal'});
                } else {
                    aboutInfo.removeClass('error').addClass('correct').html('').show();
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
                jVal.about();
                jVal.name();
                jVal.city();
                jVal.sendIt();
            });
            return false;
        });
        $('#fullname').change(jVal.fullName);
        $('#email').change(jVal.email);
        $('#about').change(jVal.about);
        $('#name').change(jVal.name);
        $('#city').change(jVal.city);
    });
</script>