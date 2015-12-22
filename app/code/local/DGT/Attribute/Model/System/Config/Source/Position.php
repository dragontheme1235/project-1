<?php
/**
 * @category    DGT
 * @package     DGT_Attribute
 * @copyright   Copyright (C) 2014-2015 dragontheme.com. All Rights Reserved.
 * @license     GNU General Public License version 2 or later
 * @author      dragontheme.com
 * @email       support@dragontheme.com
 */
class DGT_Attribute_Model_System_Config_Source_Position{
    public function toOptionArray(){
        return array(
            array('value' => 'right', 'label' => Mage::helper('dgtattribute')->__('Right')),
            array('value' => 'left', 'label' => Mage::helper('dgtattribute')->__('Left')),
            array('value' => 'top', 'label' => Mage::helper('dgtattribute')->__('Top')),
            array('value' => 'bottom', 'label' => Mage::helper('dgtattribute')->__('Bottom')),
            array('value' => 'inside', 'label' => Mage::helper('dgtattribute')->__('Inside'))
        );
    }
}