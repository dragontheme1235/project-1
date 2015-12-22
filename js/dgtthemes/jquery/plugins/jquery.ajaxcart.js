/**
 *
 * ------------------------------------------------------------------------------
 * @category     Mono
 * @package DGT Framework
 * ------------------------------------------------------------------------------
 * @copyright    Copyright (C) 2014-2015 dragontheme.com. All Rights Reserved.
 * @license      GNU General Public License version 2 or later;
 * @author       dragontheme.com
 * @email        support@dragontheme.com
 * ------------------------------------------------------------------------------
 *
 */
$dgt(function($) {
    themeResize();
    $(window).resize(function(){
        themeResize();
    });
	$('.dgt-maincart a').live('click', function(){
        var checkUrl = ($(this).attr('href').indexOf('checkout/cart/delete') > -1);
        if(checkUrl && $(this).attr('class') !='deletecart' && $(this).attr('class').indexOf('btn-remove2') == -1){
            deletecart($(this).attr('href'));
            return false;
        }
    });
    $('.success button.close').live('click', function() {
        $(this).parent().removeClass('slow-status', function() {
            $(this).remove();
        });
    });
    $('.options-cart').on('click', function() {
        $.colorbox({
            iframe: true,
            href:this.href,
            opacity:	0.5,
            speed:		300,
            current:	'{current} / {total}',
            close:      "close",
            innerWidth:'780px',
            innerHeight:'650px',
            onOpen: function(){
                $('#cboxLoadingGraphic').addClass('box-loading');
            },
            onComplete: function(){
                setTimeout(function(){
                    $('#cboxLoadingGraphic').removeClass('box-loading');
                },1300);
            }
        });
        e.preventDefault();
        return false;
    });

    $('.show-options').live('click', function(e){
        if($('.btn-cart-mobile').length == 0){
            $('[data-id=options-cart-' + $(this).attr('data-id')+']').trigger('click');
        }else{
            return window.location.href=$(this).attr('data-submit');
        }
    });

    if($('.product-view').length>0 && $('.option-file').length == 0 && $('.btn-cart-mobile').length == 0){
        productAddToCartForm.submit = function(button, url) {
            if (this.validator.validate()) {
                var form = this.form;
                var oldUrl = form.action;
                if (url) {
                    form.action = url;
                }
                var e = null;
                if (!url) {
                    url = $('#product_addtocart_form').attr('action');
                }
                var checkWishlistUrl = (url.indexOf('wishlist/index/cart') > -1);

                url = url.replace("checkout/cart","ajaxcart/index");
                
                var data = $('#product_addtocart_form').serialize();
                data += '&isAjax=1';
                try {
                    if(checkWishlistUrl){
                        this.form.submit();
                    }else{
                        if($('#qty').val()==0){
                            if($('.error_qty').length==0){
                                $('<span/>').html('The quantity not zero!')
                                    .addClass('error_qty')
                                    .appendTo($('.add-to-cart'));
                            }
                        }else{
                            $('.error_qty').remove();
                            $("span.textrepuired").html('');
                            if(!$('.ajaxcart-index-options').length > 0){
                                showCartBox(datatext.load,true);
                            }
                            $.ajax( {
                                url : url,
                                dataType : 'json',
                                type : 'post',
                                data : data,
                                success : function(data) {
                                    parent.setAjaxData(data,true);
                                    $.colorbox.close();
                                    if (button && button != 'undefined') {
                                        button.disabled = false;
                                    }
                                }
                            });
                        }
                    }
                } catch (e) {
                }
                this.form.action = oldUrl;
                if (e) {
                    throw e;
                }

            }
            return false;
        }.bind(productAddToCartForm);
    }
});
function themeResize()
{
    width = $dgt(window).width();
    if(width <= 752){
        $dgt('body').find('.btn-cart').addClass('btn-cart-mobile');
        if($dgt('.product-quick-view').length>0){
            $dgt('body').find('.btn-cart').removeClass('btn-cart-mobile');
        }
    }else{
        $dgt('body').find('.btn-cart').removeClass('btn-cart-mobile');
    }
}
function setAjaxData(data,iframe){
    if(data.status == 'ERROR'){
        showCartBox(data.message);
    }else{
        $dgt('.dgt-maincart').html('');
        if($dgt('.dgt-maincart')){
            $dgt('.dgt-maincart').append(data.output);
        }
        if($dgt('.header .links')){
            $dgt('.header .links').replaceWith(data.toplink);
        }
        $dgt.colorbox.close();
        showCartBox(data.message);
    } 
} 
function showCartBox(message,wait)
{
    $dgt('#ajax-status').html('<div class="success show-status">' +
    '' + message + '' +
    '<button class="close"><i class="fa fa-times-circle"></i></button></div>');
    if(wait){
        $dgt('.success').addClass('ajax-loading');
        $dgt('.success .fa-check').hide();
        $dgt('.success .close').hide();
    }else{
        $dgt('.success').removeClass('ajax-loading');
        $dgt('.success .fa-check').show();
        $dgt('.success .close').show();
    }
    if(!wait){
        setTimeout(function() {
            $dgt('.success').delay(500).removeClass('show-status');
        }, 10000);
    }
}
function setLocation(url)
{
    var checkUrl = (url.indexOf('checkout/cart') > -1);
    var pass = true;
    if($dgt('body').find('.btn-cart-mobile').length > 0){
        pass = false;
    }
    if(checkUrl && pass){ 
        data = '&isAjax=1&qty=1';
        url = url.replace("checkout/cart","ajaxcart/index");
        console.log(url);
        showCartBox(datatext.load,true);
        try {
            $dgt.ajax( {
                url : url,
                dataType : 'json',
                data: data,
                type: 'post',
                success : function(data) {
                    setAjaxData(data);
                }
            });
        } catch (e) {
        }
        return false;
    }
    return window.location.href=url;
}
function deletecart(url){
    var checkUrl = (url.indexOf('checkout/cart') > -1);
    if(checkUrl){ 
        if (confirm("Are you sure you would like to remove this item from the shopping cart?")) {
            data = '&isAjax=1&qty=1';
            var url = url.replace("checkout/cart","ajaxcart/index");
            showCartBox(datatext.load,true);
            $dgt.ajax( {
                url : url,
                dataType : 'json',
                data: data,
                type: 'post',
                success : function(data) {
                    setAjaxData(data,false);
                }
            });
        } 
    }
    return false;
}