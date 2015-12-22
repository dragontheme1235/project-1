<?php
/**
 * @category    DGT
 * @package     DGT_Widget
 * Copyright (C) 2014-2015 dragontheme.com. All Rights Reserved.
 * @license     GNU General Public License version 2 or later
 * @author      dragontheme.com
 * @email       support@dragontheme.com
 */

class DGT_Widget_Model_Widget_Source_Type{
    public function toOptionArray(){
        $types = array(
            array('value' => 'product', 'label' => Mage::helper('dgtwidget')->__('Product')),
            array('value' => 'block', 'label' => Mage::helper('dgtwidget')->__('Block')),
            array('value' => 'attribute', 'label' => Mage::helper('dgtwidget')->__('Attribute')),
            array('value' => 'category', 'label' => Mage::helper('dgtwidget')->__('Category')),
            array('value' => 'blog', 'label' => Mage::helper('dgtwidget')->__('Blog'))
        );

        return $types;
    }
}
