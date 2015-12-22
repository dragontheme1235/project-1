<?php
/**
 * @category    DGT
 * @package     DGT_Widget
 * Copyright (C) 2014-2015 dragontheme.com. All Rights Reserved.
 * @license     GNU General Public License version 2 or later
 * @author      dragontheme.com
 * @email       support@dragontheme.com
 */

class DGT_Widget_Model_Widget_Source_Tab{
    public function toOptionArray(){
        return array(
            array('value' => 'none', 'label' => Mage::helper('dgtwidget')->__('None')),
            array('value' => 'categories', 'label' => Mage::helper('dgtwidget')->__('Categories')),
            array('value' => 'collections', 'label' => Mage::helper('dgtwidget')->__('Collections'))
        );
    }
}
