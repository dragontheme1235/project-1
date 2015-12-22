<?php
/**
 * @category    DGT
 * @package     DGT_Widget
 * Copyright (C) 2014-2015 dragontheme.com. All Rights Reserved.
 * @license     GNU General Public License version 2 or later
 * @author      dragontheme.com
 * @email       support@dragontheme.com
 */

class DGT_Widget_Model_Widget_Source_Background_Overlay{
    public function toOptionArray(){
        $types[] = array('value' => 'none', 'label' => Mage::helper('dgtwidget')->__('None'));
        $types[] = array('value' => 'js/dgt/widget/images/gridtile.png', 'label' => Mage::helper('dgtwidget')->__('2 x 2 Black'));
        $types[] = array('value' => 'js/dgt/widget/images/gridtile_white.png', 'label' => Mage::helper('dgtwidget')->__('2 x 2 White'));
        $types[] = array('value' => 'js/dgt/widget/images/gridtile_3x3.png', 'label' => Mage::helper('dgtwidget')->__('3 x 3 Black'));
        $types[] = array('value' => 'js/dgt/widget/images/gridtile_3x3_white.png', 'label' => Mage::helper('dgtwidget')->__('3 x 3 White'));

        return $types;
    }
}
