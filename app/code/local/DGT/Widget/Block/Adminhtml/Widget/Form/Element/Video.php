<?php
/**
 * @category    DGT
 * @package     DGT_Widget
 * @copyright   Copyright (C) 2014-2015 dragontheme.com. All Rights Reserved.
 * @license     GNU General Public License version 2 or later
 * @author      dragontheme.com
 * @email       support@dragontheme.com
 */
class DGT_Widget_Block_Adminhtml_Widget_Form_Element_Video
    extends Mage_Adminhtml_Block_Widget
    implements Varien_Data_Form_Element_Renderer_Interface{

    protected $_element;

    public function __construct(){
        parent::__construct();
        $this->setTemplate('dgt/widget/adminhtml/widget/form/element/video.phtml');
    }

    public function getElement(){
        return $this->_element;
    }

    public function setElement(Varien_Data_Form_Element_Abstract $element){
        return $this->_element = $element;
    }

    public function render(Varien_Data_Form_Element_Abstract $element){
        $this->setElement($element);
        return $this->toHtml();
    }

    protected function _beforeToHtml(){
        $getBtn = $this->getLayout()->createBlock('adminhtml/widget_button', 'button',  array(
            'label'     => Mage::helper('dgtext')->__('Get'),
            'title'     => Mage::helper('dgtext')->__('Click to preview video'),
            'class'     => 'add',
            'type'      => 'button',
            'id'        => 'videoSearchBtn',
            'onclick'   => "return window.{$this->getElement()->getHtmlId()}.search()"
        ));
        $this->setChild('getBtn', $getBtn);
        $delBtn = $this->getLayout()->createBlock('adminhtml/widget_button', 'button',  array(
            'label'     => Mage::helper('dgtext')->__('x'),
            'title'     => Mage::helper('dgtext')->__('Click to remove url'),
            'type'      => 'button',
            'id'        => 'videoRemoveBtn',
            'onclick'   => "return window.{$this->getElement()->getHtmlId()}.remove()"
        ));
        $this->setChild('delBtn', $delBtn);

        return parent::_beforeToHtml();
    }
}