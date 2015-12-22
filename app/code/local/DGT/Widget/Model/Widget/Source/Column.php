<?php
/**
 * @category    DGT
 * @package     DGT_Widget
 * Copyright (C) 2014-2015 dragontheme.com. All Rights Reserved.
 * @license     GNU General Public License version 2 or later
 * @author      dragontheme.com
 * @email       support@dragontheme.com
 */

class DGT_Widget_Model_Widget_Source_Column{
    public function toOptionArray(){
        $types = array(
            array('value' => '1', 'label' => Mage::helper('dgtwidget')->__('1')),
            array('value' => '2', 'label' => Mage::helper('dgtwidget')->__('2')),
            array('value' => '3', 'label' => Mage::helper('dgtwidget')->__('3')),
            array('value' => '4', 'label' => Mage::helper('dgtwidget')->__('4')),
            array('value' => '6', 'label' => Mage::helper('dgtwidget')->__('6')),
            array('value' => '12', 'label' => Mage::helper('dgtwidget')->__('12'))
        );
        return $types;
    }
}
