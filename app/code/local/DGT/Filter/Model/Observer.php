<?php
/**
 * @category    DGT
 * @package     DGT_Filter
 * Copyright (C) 2014-2015 dragontheme.com. All Rights Reserved.
 * @license     GNU General Public License version 2 or later
 * @author      dragontheme.com
 * @email       support@dragontheme.com
 */

class DGT_Filter_Model_Observer{
    public function coreBlockAbstractPrepareLayoutAfter($observer){
        $block = $observer->getEvent()->getBlock();
        if ($block->getData('type') == 'catalog/layer_view' || $block->getData('type') == 'catalogsearch/layer'){
            if (!Mage::getStoreConfigFlag('dgtfilter/discount/enable')) return;
            $attributes = $block->getData('_filterable_attributes');
            $data = array();
            foreach ($attributes as $attribute){
                $data[] = $attribute;
            }
            $discountObj = new Varien_Object(array(
                'attribute_code' => 'discount'
            ));
            $data[] = $discountObj;
            $block->setData('_filterable_attributes', $data);
            $block->setChild('discount_filter',
                Mage::getSingleton('core/layout')->createBlock('dgtfilter/catalog_layer_filter_discount', null, array(
                    'layer' => $block->getLayer()
                ))->init()
            );
        }
    }
}
