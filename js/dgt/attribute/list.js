/**
 * @category    DGT
 * @package     DGT_Widget
 * @copyright   Copyright (C) 2014-2015 dragontheme.com. All Rights Reserved.
 * @license     GNU General Public License version 2 or later
 * @author      dragontheme.com
 * @email       support@dragontheme.com
 */
document.observe('dom:loaded', function(){
    $$('.attr-image img').each(function(img){
        img.observe('mouseover', function(ev){
            var photo = img.readAttribute('origin');
            if (photo){
                var target = img.up('.item').down('a img');
                if (target) target.src = photo;
            }
        });
    });
});