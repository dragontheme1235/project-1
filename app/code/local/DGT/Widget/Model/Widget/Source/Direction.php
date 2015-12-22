<?php
/**
 * @category    DGT
 * @package     DGT_Widget
 * @copyright   Copyright (C) 2014-2015 dragontheme.com. All Rights Reserved.
 * @license     GNU General Public License version 2 or later
 * @author      dragontheme.com
 * @email       support@dragontheme.com
 */

class DGT_Widget_Model_Widget_Source_Direction{
    public function toOptionArray(){
        return array(
            array('value'=>'horizontal', 'label'=>Mage::helper('dgtwidget')->__('Horizontal')),
            array('value'=>'vertical', 'label'=>Mage::helper('dgtwidget')->__('Vertical'))
        );
    }
}