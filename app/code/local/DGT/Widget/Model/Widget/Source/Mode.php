<?php
/**
 * @category    DGT
 * @package     DGT_Widget
 * Copyright (C) 2014-2015 dragontheme.com. All Rights Reserved.
 * @license     GNU General Public License version 2 or later
 * @author      dragontheme.com
 * @email       support@dragontheme.com
 */
class DGT_Widget_Model_Widget_Source_Mode{
    public function toOptionArray(){
        $modes = array(
            array('value' => 'latest', 'label' => Mage::helper('dgtwidget')->__('Latest Products')),
            array('value' => 'new', 'label' => Mage::helper('dgtwidget')->__('New Products')),
            array('value' => 'bestsell', 'label' => Mage::helper('dgtwidget')->__('Best Sell Products')),
            array('value' => 'mostviewed', 'label' => Mage::helper('dgtwidget')->__('Most Viewed Products')),
            array('value' => 'id', 'label' => Mage::helper('dgtwidget')->__('Specified Products')),
            array('value' => 'random', 'label' => Mage::helper('dgtwidget')->__('Random Products')),
            array('value' => 'related', 'label' => Mage::helper('dgtwidget')->__('Related Products')),
            array('value' => 'upsell', 'label' => Mage::helper('dgtwidget')->__('Up-sell Products')),
            array('value' => 'crosssell', 'label' => Mage::helper('dgtwidget')->__('Cross-sell Products')),
            array('value' => 'discount', 'label' => Mage::helper('dgtwidget')->__('Discount Products')),
            array('value' => 'rating', 'label' => Mage::helper('dgtwidget')->__('Top Rated Products'))
        );

        return $modes;
    }
}
