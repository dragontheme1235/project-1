<?php
/**
 * @category    DGT
 * @package     DGT_Widget
 * @copyright   Copyright (C) 2014-2015 dragontheme.com. All Rights Reserved.
 * @license     GNU General Public License version 2 or later
 * @author      dragontheme.com
 * @email       support@dragontheme.com
 */

class DGT_Widget_Model_Widget_Source_Parallax_Image_Size{
    public function toOptionArray(){
        $types[] = array('value' => 'cover',    'label' => Mage::helper('dgtwidget')->__('cover'));
        $types[] = array('value' => 'contain',   'label' => Mage::helper('dgtwidget')->__('contain'));

        return $types;
    }
}