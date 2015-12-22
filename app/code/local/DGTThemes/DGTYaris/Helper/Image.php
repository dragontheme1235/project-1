<?php
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
?>
<?php

class DGTThemes_DGTYaris_Helper_Image extends Mage_Core_Helper_Abstract
{
	public function getImg($product, $w, $h, $imgVersion='image', $file=NULL)
	{
        $ratiocf = Mage::getStoreConfig('dgtyaris/category/aspect_ratio_size');
        $height = Mage::getStoreConfig('dgtyaris/category/image_height');
		if ($h <= 0)
		{
            $w_new = $w ? $w : '300';
            if($ratiocf == 'original'){
                $new_h = $height;
            } else if($ratiocf == '1:1'){
                $new_h = $w_new;
            } else if($ratiocf == '3:4'){
                $new_h = round($w_new*(3/4));
            } else {
                $new_h = round($w_new*(4/3));
            }
            return $url = Mage::helper('catalog/image')
                ->init($product, $imgVersion, $file)
                ->resize($w_new, $new_h);
		}
		else
		{
            return $url = Mage::helper('catalog/image')
				->init($product, $imgVersion, $file)
				->resize($w, $h);
		}
	}
}
