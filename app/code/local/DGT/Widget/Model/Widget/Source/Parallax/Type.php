<?php
/**
 * @category    DGT
 * @package     DGT_Widget
 * Copyright (C) 2014-2015 dragontheme.com. All Rights Reserved.
 * @license     GNU General Public License version 2 or later
 * @author      dragontheme.com
 * @email       support@dragontheme.com
 */

class DGT_Widget_Model_Widget_Source_Parallax_Type{
    public function toOptionArray(){
        $types[] = array('value' => 'image', 'label' => Mage::helper('dgtwidget')->__('Image'));
        $types[] = array('value' => 'video', 'label' => Mage::helper('dgtwidget')->__('Video Service'));
        $types[] = array('value' => 'file', 'label' => Mage::helper('dgtwidget')->__('Video File'));

        return $types;
    }
}
