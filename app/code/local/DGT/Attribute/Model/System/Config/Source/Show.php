<?php
/**
 * @category    DGT
 * @package     DGT_Attribute
 * @copyright   Copyright (C) 2014-2015 dragontheme.com. All Rights Reserved.
 * @license     GNU General Public License version 2 or later
 * @author      dragontheme.com
 * @email       support@dragontheme.com
 */
class DGT_Attribute_Model_System_Config_Source_Show{
    public function toOptionArray(){
        return array(
            array('value' => 0, 'label' => Mage::helper('dgtattribute')->__('Not show')),
            array('value' => 2, 'label' => Mage::helper('dgtattribute')->__('Replace')),
            array('value' => 3, 'label' => Mage::helper('dgtattribute')->__('Show all'))
        );
    }
}