<?php
/**
 *
 * ------------------------------------------------------------------------------
 * @category     Mono
 * @package      DGT_Newsletter
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
class DGT_Newsletter_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function getCfgEnable()
    {
        return Mage::getStoreConfig('dgtnewsletter/display_options/enable');
    }
    public function getCfgTitle()
    {
        return Mage::getStoreConfig('dgtnewsletter/display_options/title');
    }
    public function getCfgWidth()
    {
        return Mage::getStoreConfig('dgtnewsletter/display_options/width');
    }
    public function getCfgHeight()
    {
        return Mage::getStoreConfig('dgtnewsletter/display_options/height');
    }
    public function getCfgTextColor()
    {
        return Mage::getStoreConfig('dgtnewsletter/display_options/text_color');
    }
    public function getCfgBackgroundColor()
    {
        return Mage::getStoreConfig('dgtnewsletter/display_options/background_color');
    }
    public function getCfgBackgroundImage()
    {
        return Mage::getStoreConfig('dgtnewsletter/display_options/background_image');
    }
    public function getCfgThumbnailImage()
    {
        return Mage::getStoreConfig('dgtnewsletter/display_options/thumbnail_image');
    }
    public function getCfgIntro()
    {
        return Mage::getStoreConfig('dgtnewsletter/display_options/intro');
    }
}