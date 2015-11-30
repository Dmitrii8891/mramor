/**
 * Created by vitaliy on 22.01.15.
 */
$(function () {
    

    $('.service-status').on('click', function(e){
        e.preventDefault();
        var status = $(this).data('status');
        if(status){
            this.removeAttribute("data-status");
            this.setAttribute("data-status","0");
            $(this).removeData();
            $(this).find('span').removeClass('glyphicon-remove');
            $(this).find('span').addClass('glyphicon-ok');
            var row = $(this).closest('tr');
            row.removeClass('active_');
            row.addClass('non_active');
            row.find('.status').val('0');
            row.find('.service-price').attr('disabled', 'disabled');
        } else {
            this.removeAttribute("data-status");
            this.setAttribute("data-status","1");
            $(this).removeData();
            $(this).find('span').removeClass('glyphicon-ok');
            $(this).find('span').addClass('glyphicon-remove');
            var row = $(this).closest('tr');
            row.removeClass('non_active');
            row.addClass('active_');
            row.find('.status').val('1');
            row.find('.service-price').removeAttr('disabled');
        }
    })


});