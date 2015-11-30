/**
 * Created by vitaliy on 19.01.15.
 */


$(document).ready( function(){
    /*******index_stone_filter************/
    var stone_filter = {};

    $('#select_type a').on('click', function(e){
        e.preventDefault();
        stone_filter.filter_one = $(this).closest('li').data('type');
        console.log(stone_filter);
        var post = JSON.stringify(stone_filter);
        $.post( "site/ajax-filter", {post:post}, function( data ) {
            $('#mCSB_1_container').html(data);
        });
    });

    $('#select_color a').on('click', function(e){
        e.preventDefault();
        stone_filter.filter_two = $(this).closest('li').data('color');
        console.log(stone_filter);
        var post = JSON.stringify(stone_filter);
        $.post( "site/ajax-filter", {post:post}, function( data ) {
            $('#mCSB_1_container').html(data);
        });
    });
    /*******end_index_stone_filter**********************/

    /*******big-stone-ajax-filter**********************************
     *******send request to StoneController AjaxFilter*************
     ******before renew items, delete all old html tags ************/
    AjaxRequest = function(params){

        var XHR=window.XDomainRequest||window.XMLHttpRequest;
        var xhr=new XHR();
        xhr.open('GET','/stone/ajax-filter?'+params);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onload=function(){var response=null;};
        xhr.onerror=function(){var response="Error";};

        xhr.send();
        xhr.onreadystatechange = function() {
            if (this.readyState == 4) {
                // обработать ошибку
                if(document.getElementById("items")){
                    document.getElementById("items").remove();
                }
                if(document.getElementById("pagination")){
                    document.getElementById("pagination").remove();
                }
                if(document.getElementById("w0")){
                    document.getElementById("w0").remove();
                }
                var node = this.status ? this.responseText : 'запрос не удался';
                $("#stone_result").append(node);

            }
        }
    };

    //$('#stone-filter-form').on('click', 'input', function(){
    //
    //   AjaxRequest($('#stone-filter-form').serialize());
    //
    //});

    $('#submit-pod').click(function(){
        var input_data = $('#email-pod').val();
        $('#subscribe-email').val(input_data);

    });

    /*
     get snap amount programmatically or just set it directly (e.g. "273")
     in this example, the snap amount is list item's (li) outer-width (width+margins)
     */
    var amount=Math.max.apply(Math,$("#content-1 li").map(function(){return $(this).outerWidth(true);}).get());

    $("#content-1").mCustomScrollbar({
        axis:"x",
        theme:"inset",
        advanced:{
            autoExpandHorizontalScroll:true
        },
        scrollButtons:{
            enable:true,
            scrollType:"stepped"
        },
        keyboard:{scrollType:"stepped"},
        snapAmount:amount,
        mouseWheel:{scrollAmount:amount}
    });


    /***********************************end big filter**********************************/

});
