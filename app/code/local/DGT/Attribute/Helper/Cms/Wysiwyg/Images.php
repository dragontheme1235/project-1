<?php
/**
 * @category    DGT
 * @package     DGT_Attribute
 * @copyright   Copyright (C) 2014-2015 dragontheme.com. All Rights Reserved.
 * @license     GNU General Public License version 2 or later
 * @author      dragontheme.com
 * @email       support@dragontheme.com
 */
class DGT_Attribute_Helper_Cms_Wysiwyg_Images extends Mage_Cms_Helper_Wysiwyg_Images{
    public function isUsingStaticUrlsAllowed(){
        if (Mage::getSingleton('adminhtml/session')->getStaticUrlsAllowed()){
            return true;
        }
        return parent::isUsingStaticUrlsAllowed();
    }
}