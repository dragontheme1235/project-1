<?php
/**
 * @category    DGT
 * @package     DGT_Attribute
 * @copyright   Copyright (C) 2014-2015 dragontheme.com. All Rights Reserved.
 * @license     GNU General Public License version 2 or later
 * @author      dragontheme.com
 * @email       support@dragontheme.com
 */
class DGTThemes_DGTTheme_Model_System_Config_Source_Details_Thumbnail_Position
{
    public function toOptionArray(){
        return array(
            array('value' => 'horizontal', 'label' => Mage::helper('adminhtml')->__('Horizontal (Default)')),
            array('value' => 'vertical-left', 'label' => Mage::helper('adminhtml')->__('Vertical Left')),
            array('value' => 'vertical-right', 'label' => Mage::helper('adminhtml')->__('Vertical Right'))
        );
    }
}