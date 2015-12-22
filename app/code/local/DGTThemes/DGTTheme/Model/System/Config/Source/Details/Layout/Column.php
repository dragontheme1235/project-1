<?php
/**
 * @category    DGT
 * @package     DGT_Attribute
 * @copyright   Copyright (C) 2014-2015 dragontheme.com. All Rights Reserved.
 * @license     GNU General Public License version 2 or later
 * @author      dragontheme.com
 * @email       support@dragontheme.com
 */
class DGTThemes_DGTTheme_Model_System_Config_Source_Details_Layout_Column
{
    public function toOptionArray(){
        return array(
            array('value' => '6/6', 'label' => Mage::helper('adminhtml')->__('6/6')),
            array('value' => '5/7', 'label' => Mage::helper('adminhtml')->__('5/7')),
            array('value' => '4/8', 'label' => Mage::helper('adminhtml')->__('4/8')),
            array('value' => '3/9', 'label' => Mage::helper('adminhtml')->__('3/9'))
        );
    }
}