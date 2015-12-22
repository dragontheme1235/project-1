<?php
/**
 * @category    DGT
 * @package     DGT_Widget
 * Copyright (C) 2014-2015 dragontheme.com. All Rights Reserved.
 * @license     GNU General Public License version 2 or later
 * @author      dragontheme.com
 * @email       support@dragontheme.com
 */

class DGT_Widget_Block_Adminhtml_Widget_Form_Element_Collection
    extends Mage_Adminhtml_Block_Widget
    implements Varien_Data_Form_Element_Renderer_Interface{

    protected $_element;

    public function __construct(){
        parent::__construct();
        $this->setTemplate('dgt/widget/adminhtml/widget/form/element/collection.phtml');
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

    public function getOptions(){
        $output = array();
        $values = $this->getElement()->getValue();

        if (!is_array($values)) $values = explode(',', $values);
        $sourceModel = Mage::getModel('dgtwidget/widget_source_tab_mode');
        $options = $sourceModel->toOptionArray();

        foreach ($values as $value){
            foreach ($options as $option){
                if ($option['value'] == $value){
                    array_push($output, array(
                        'value' => $option['value'],
                        'label' => $option['label'],
                        'selected'  => true
                    ));
                }
            }
        }

        foreach ($options as $option){
            if (!in_array($option['value'], $values)){
                array_push($output, array(
                    'value' => $option['value'],
                    'label' => $option['label'],
                    'selected'  => false
                ));
            }
        }

        return $output;
    }
}
