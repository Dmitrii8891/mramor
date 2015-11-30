<?php

use yii\helpers\Html;
use yii\widgets\MyListView;
use frontend\models\FilterForm;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ItemsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Изделия';
$this->params['breadcrumbs'][] = $this->title;

$this->registerMetaTag(['name' => 'description', 'content' => 'This website is about funny raccoons.']);

?>
<div class="catalog-izdelij-wrap-all">
    <div class="catalog-izdelij-wrap">
        <div class="like-mrampr-form">
            <div class="like-mirror">
                <p>
                    Изящные решения</br>
                    для любителей</br>
                    мрамора
                </p>
            </div>
            <div class="like-form">
                <div class="error"></div>
                <div class="consultation-catalog-izdelij">Быстрая консультация</div>
                <div id="nameInfo" class="info"></div>
                <div id="emailInfo" class="info"></div>
                <div id="aboutInfo" class="info"></div>
                <form action="/site/index" id="jform" method="post">
                    <input type="text" name="QuickOrder[phone_num]" id="fullname"  class="text-consult" placeholder="Телефон"/>
                    <input type="text" name="QuickOrder[email]" id="email"  class="text-consult" placeholder="Электронная почта"/>
                    <textarea name="QuickOrder[comment]" id="about" class="area-consult" placeholder="Комментарий" ></textarea>
                    <input type="submit" id="send" class="submit-consult" value="Отправить"/>
                </form>
            </div>
        </div>
        <div class="block-min-wrap-all">
            <?php
            echo MyListView::widget( [
                'dataProvider' => $dataProvider,
                'itemView'=>'_goods_category_list',
                'summary'=>'',
            ] );
            ?>

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
            'sendIt' : function (){
                if(!jVal.errors) {
                    $('#jform').submit();
                }
            }
        };
// ====================================================== //
        $('#send').click(function (){
            var obj = $.browser.webkit ? $('body') : $('html');
            obj.animate({ scrollTop: $('#jform').offset().top -68 }, 450, function (){
                jVal.errors = false;
                jVal.fullName();
                jVal.email();
                jVal.about();
                jVal.sendIt();
            });
            return false;
        });
        $('#fullname').change(jVal.fullName);
        $('#email').change(jVal.email);
        $('#about').change(jVal.about);
    });
</script>