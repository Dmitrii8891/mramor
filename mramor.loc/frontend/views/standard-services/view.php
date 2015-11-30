<?php
use yii\widgets\ListView;
use yii\helpers\Html;
?>
<div class="catalog-izdelij-wrap-all">
    <div class="catalog-izdelij-wrap">
        <div class="like-mrampr-form" id="like-colons-form">
            <div class="like-mirror" id="like-colona" style="background: url('<?= $model->image ?>') no-repeat">
                <p><?= $model->name ?></p>
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
        <div class="slider-colons-wrap">
            <a id="prew"></a>
            <a id="next"></a>
            <div id="demo5" class="scroll-img-colons">
                <ul>
                    <?php $i=0; foreach($model->getGallery() as $image): ?>
                        <li class="small_items">
                            <a href="<?= $model->minImg($image, 'original'); ?>" title="" data-options="thumbnail: '<?= $image ?>'" class="thumbnail">
                                <img id="logos-<?= $i++;?>"  src="<?= $image; ?>" alt="" >
                            </a>
                        </li>

                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="slid-line"></div>
        <div class="text-block-single">
            <?=  Html::tag('p',$model->description)  ?>
        </div>
    </div>
</div>
<script>
    $(function () {
        $('#demo5').scrollbox({
            direction: 'h',
            distance: 220,
            autoPlay: false
        });
        $('#prew').click(function () {
            $('#demo5').trigger('backward');
        });
        $('#next').click(function () {
            $('#demo5').trigger('forward');
        });
    });
</script>
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
                if(ele.val().length < 1) {
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
<script type="text/javascript">

    $(function() {
        $('.thumbnail').iLightBox(
            {
                skin: 'metro-black',
                path: 'horizontal',
                maxScale: 1.3,
                overlay: {
                    opacity: .8
                },
                styles: {
                    nextOffsetX: 75,
                    nextOpacity: .55,
                    prevOffsetX: 75,
                    prevOpacity: .55
                },
                thumbnails: {
                    normalOpacity: .9,
                    activeOpacity: 1
                },
                controls: {
                    thumbnail: 1,
                    arrows: 1
                }
            });

        $('#demo5').scrollbox({
            direction: 'h',
            distance: 150,
            autoPlay: false
        });
        $('#prew').click(function () {
            $('#demo5').trigger('backward');
        });
        $('#next').click(function () {
            $('#demo5').trigger('forward');
        });
    });

</script>