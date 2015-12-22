<?php
/**
 * @category    DGT
 * @package     DGT_Widget
 * @copyright   Copyright (C) 2014-2015 dragontheme.com. All Rights Reserved.
 * @license     GNU General Public License version 2 or later
 * @author      dragontheme.com
 * @email       support@dragontheme.com
 */
class DGT_Widget_Model_Widget_Source_Attribute {
    public function toOptionArray(){
        $attributes = array();
        $collection = Mage::getResourceModel('eav/entity_attribute_collection')
            ->setEntityTypeFilter(Mage::getModel('catalog/product')->getResource()->getTypeId())
            ->addFieldToFilter('is_filterable', array('eq' => '1'))
            ->addFieldToFilter('frontend_input', array('eq' => 'select'));
        foreach ($collection as $attribute){
            $attributes[] = array(
                'value'=>$attribute->getAttributeId() .','. $attribute->getAttributeCode(),
                'label'=>$attribute->getFrontendLabel());
        }
        return $attributes;
    }
}