$( document ).ready(function() {
    $('.menu-color-ul li').click(function(e) {
        if (event.preventDefault) { event.preventDefault(); } else { event.returnValue = false; }
        $('.menu-color-ul li').removeAttr('id','content-holder-menu-active');
        $(this).attr('id','content-holder-menu-active');
    });
    $('.color-wrap-menu li').click(function(e) {
        if (event.preventDefault) { event.preventDefault(); } else { event.returnValue = false; }
        $('.color-wrap-menu li').removeAttr('id','color-menu-active');
        $(this).attr('id','color-menu-active');
    });
    $('.socseti').click(function(){
        $('.socseti').removeAttr('id', 'active-soc');
        $('.socseti').each(function(){
            var list = this.classList;
            $(this).attr('src','/images/'+list[0]+'.png');
        });
        $(this).attr('id','active-soc');
        var list =this.classList;
        $(this).attr('src','/images/'+list[0]+'-hover.png');
    });
    var qwerty = $('.scrl-wrap').find('.scrl-img-text').length;
    $('.scrl-wrap').css({width:qwerty*232-12});
    $('.vk').click(function(){
        $('.arrow-soc').css({left:'9px'});
        $('.widget-vk').fadeIn(550).css({display:'block'});
        $('.widget-fb').css({display:'none'});
        $('.widget-ins').css({display:'none'});
    });
    $('.fb').click(function(){
        $('.arrow-soc').css({left:'54px'});
        $('.widget-fb').fadeIn(550).css({display:'block'});
        $('.widget-vk').css({display:'none'});
        $('.widget-ins').css({display:'none'});
    });
    $('.inst').click(function(){
        $('.arrow-soc').css({left:'99px'});
        $('.widget-ins').fadeIn(550).css({display:'block'});
        $('.widget-vk').css({display:'none'});
        $('.widget-fb').css({display:'none'});
    });
});