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
$dgt(function($){
    $('.success button.close').live('click', function() {
        $(this).parent().removeClass('show-status', function() {
            $(this).remove();
        });
    });
});
function showBox(message,wait){
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
        }, 4000);
    }
}

function addtowishlist(el)
{
	var url = jQuery(el).attr('href');
    var checkUpdateUrl = (url.indexOf('wishlist/index/updateItemOptions') > -1);
    if(checkUpdateUrl){
        url = url.replace("wishlist/index/updateItemOptions","ajaxcart/index/updateWishlist");
    }else{
        url = url.replace("wishlist/index/add","ajaxcart/index/wishlist");
    }
    data = '&isAjax=1';
    showBox(datatext.load,true);
	try {
		jQuery.ajax( {
			url : url,
			dataType : 'jsonp',
			data: data,
			type: 'post',
			success : function(data) {
				showBox(data.message,false);
				if (data.status != 'ERROR'){
					jQuery('.header .links').replaceWith(data.toplink);
				}
				if (data.status != 'ERROR' && jQuery('.block-wishlist').length){
					jQuery('.block-wishlist').replaceWith(data.sidebar);
				}
			}
		});
	} catch (e) {
	} 
} 
function removetowishlist(el)
{
	var url = jQuery(el).attr('href');
	data = '&isAjax=1';
	url = url.replace("wishlist/index","ajaxcart/index");
    showBox(datatext.load,true);
	try {
		jQuery.ajax( {
			url : url,
			dataType : 'jsonp',
			data: data,
			type: 'post',
			success : function(data) {
				showBox(data.message,false);
				if (data.status != 'ERROR'){
					jQuery('.header .links').replaceWith(data.toplink);
				}
				if (data.status != 'ERROR' && jQuery('.block-wishlist').length){ 
					jQuery('.block-wishlist').replaceWith(data.sidebar);
					if(data.sidebar==''){
						jQuery('.block-wishlist').remove();
					}
				}
			}
		});
	} catch (e) {
	} 
} 
function addtocompare(el)
{ 
	var url = jQuery(el).attr('href');
	data = '&isAjax=1';
	url = url.replace("catalog/product_compare/add","ajaxcart/index/compare");
    showBox(datatext.load,true);
	try {
		jQuery.ajax( {
			url : url,
			dataType : 'jsonp',
			data: data,
			type: 'post',
			success : function(data) {
				showBox(data.message,false);
				if (data.status != 'ERROR' && jQuery('.block-compare').length) {  
					jQuery('.block-compare').replaceWith(data.output);
				}
				if (data.status != 'ERROR'){
					jQuery('.block-top-compare').html();
					jQuery('.block-top-compare').html(data.topcompare);
				}
			}
		});
	} catch (e) {
	} 
}  
function removecompare(el)
{ 
	var url = jQuery(el).attr('href');
	data = '&isAjax=1';
	url = url.replace("catalog/product_compare/remove","ajaxcart/index/rmcompare");
    showBox(datatext.load,true);
	try {
		jQuery.ajax( {
			url : url,
			dataType : 'jsonp',
			data: data,
			type: 'post',
			success : function(data) {
				showBox(data.message,false);
				if (data.status != 'ERROR' && jQuery('.block-compare').length) {  
					jQuery('.block-compare').replaceWith(data.output);
				}
				if (data.status != 'ERROR'){
					jQuery('.block-top-compare').html();
					jQuery('.block-top-compare').html(data.topcompare);
				}
			}
		});
	} catch (e) {
	} 
} 
function clearallcompare(el)
{ 
	var url = jQuery(el).attr('href');
	data = '&isAjax=1';
	url = url.replace("catalog/product_compare/clear","ajaxcart/index/clearall");
    showBox(datatext.load,true);
	try {
		jQuery.ajax( {
			url : url,
			dataType : 'jsonp',
			data: data,
			type: 'post',
			success : function(data) {
				showBox(data.message,false);
				if (data.status != 'ERROR' && jQuery('.block-compare').length) {  
					jQuery('.block-compare').replaceWith(data.output);
				}
				if (data.status != 'ERROR'){
					jQuery('.block-top-compare').html();
					jQuery('.block-top-compare').html(data.topcompare);
				}
			}
		});
	} catch (e) {
	} 
}