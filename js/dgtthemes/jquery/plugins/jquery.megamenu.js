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
(function($){
    $.fn.megamenu = function(options) {
        options = $.extend({
            animation: "slide",
            mm_timeout: 300
        }, options);
        var $megamenu_object = this;
        $megamenu_object.find("li.parent").each(function(){
            var $timer = 0;
            $(this).bind('mouseenter', function(e){
                var mm_item_obj = $(this).children('div');
                $(this).find("a:first").addClass('hover');
                clearTimeout($timer);
                $timer = setTimeout(function(){
                    switch(options.animation) {
                        case "show":
                            mm_item_obj.show().addClass("shown-sub");
                            break;
                        case "slide":
                            mm_item_obj.height("auto");
                            if(mm_item_obj.attr('data-align') == 'justify'){
                                mm_item_obj.width('100%');
                            }else{
                                mm_item_obj.width(mm_item_obj.attr('data-width'));
                            }
                            mm_item_obj.addClass("shown-sub show-sub-");

                            break;
                        case "fade":
                            mm_item_obj.height("auto");
                            if(mm_item_obj.attr('data-align') == 'justify'){
                                mm_item_obj.width('100%');
                            }else{
                                mm_item_obj.width(mm_item_obj.attr('data-width'));
                            }
                            mm_item_obj.delay(200).fadeTo('fast', 1).addClass("shown-sub");
                            break;
                    }
                }, options.mm_timeout);
            });
            $(this).bind('mouseleave', function(e){
                clearTimeout($timer);
                var mm_item_obj = $(this).children('div');
                $(this).find("a:first").removeClass('hover');
                switch(options.animation) {
                    case "show":
                        mm_item_obj.hide();
                        break;
                    case "slide":
                        mm_item_obj.delay(100).slideUp( 'fast',  function() {});
                        break;
                    case "fade":
                        mm_item_obj.delay(100).fadeOut( 'fast', function() {});
                        break;
                }
            });
        });
        this.show();
    };
})(jQuery);
