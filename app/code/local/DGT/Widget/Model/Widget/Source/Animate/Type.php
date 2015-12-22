<?php
/**
 * @category    DGT
 * @package     DGT_Widget
 * Copyright (C) 2014-2015 dragontheme.com. All Rights Reserved.
 * @license     GNU General Public License version 2 or later
 * @author      dragontheme.com
 * @email       support@dragontheme.com
 */

class DGT_Widget_Model_Widget_Source_Animate_Type{
    public function toOptionArray(){
        return array(
            array('value' => 'effect-zoomOut', 'label' => Mage::helper('dgtwidget')->__('Zoom Out')),
            array('value' => 'effect-zoomIn', 'label' => Mage::helper('dgtwidget')->__('Zoom In')),
            //array('value' => 'effect-slideBottom', 'label' => Mage::helper('dgtwidget')->__('Slide Bottom')),
            array('value' => 'effect-bounceIn', 'label' => Mage::helper('dgtwidget')->__('Bounce In')),
            array('value' => 'effect-bounceInRight', 'label' => Mage::helper('dgtwidget')->__('Bounce In Right')),
            //array('value' => 'effect-bounceInUp', 'label' => Mage::helper('dgtwidget')->__('Bounce In Up')),
            //array('value' => 'effect-bounceInDown', 'label' => Mage::helper('dgtwidget')->__('Bounce In Down')),
            array('value' => 'effect-pageTop', 'label' => Mage::helper('dgtwidget')->__('Page Top')),
            //array('value' => 'effect-pageTopBack', 'label' => Mage::helper('dgtwidget')->__('Page Top Back')),
            array('value' => 'effect-pageBottom', 'label' => Mage::helper('dgtwidget')->__('Page Bottom')),
            array('value' => 'effect-starwars', 'label' => Mage::helper('dgtwidget')->__('Star Wars')),
            array('value' => 'effect-pageLeft', 'label' => Mage::helper('dgtwidget')->__('Page Left')),
            array('value' => 'effect-pageRight', 'label' => Mage::helper('dgtwidget')->__('Page Right'))
        );
    }
}
