<?php
/**
 * @category    DGT
 * @package     DGT_Attribute
 * @copyright   Copyright (C) 2014-2015 dragontheme.com. All Rights Reserved.
 * @license     GNU General Public License version 2 or later
 * @author      dragontheme.com
 * @email       support@dragontheme.com
 */
class DGT_Attribute_Helper_Data extends Mage_Core_Helper_Abstract{
    public function showAttributes($product){
        if (!Mage::getStoreConfig('dgtattribute/general/show2')) return '';

        if ($product instanceof Mage_Catalog_Model_Product){
            $attrs = array();
            $width = Mage::getStoreConfig('dgtattribute/general/width2');
            $width = $width > 0 ? $width : 25;

            if ($product->getHasOptions()){
                $productImages = array();
                $skipSaleableCheck = Mage::helper('catalog/product')->getSkipSaleableCheck();

                $products = $product->getTypeInstance(true)->getUsedProducts(null, $product);
                $attributes = $product->getTypeInstance(true)->getConfigurableAttributes($product);

                foreach ($products as $p) {
                    if ($product->isSaleable() || $skipSaleableCheck) {
                        foreach ($attributes as $attribute){
                            $productAttribute = $attribute->getProductAttribute();
                            $productAttributeId = $productAttribute->getId();
                            $productAttributeValue = $p->getData($productAttribute->getAttributeCode());
                            $productImages[$productAttributeId][$productAttributeValue] = $p->getImageUrl();
                        }
                    }
                }

                foreach ($attributes as $attribute){
                    $productAttribute = $attribute->getProductAttribute();
                    if ($productAttribute->getData('used_in_product_listing') && $productAttribute->getData('frontend_input') == 'select'){
                        $optionCollection = Mage::getResourceModel('eav/entity_attribute_option_collection')
                            ->setAttributeFilter($productAttribute->getAttributeId())
                            ->setStoreFilter()
                            ->load();

                        $options = array();
                        foreach ($optionCollection as $option){
                            $options[$option->getOptionId()] = array(
                                'image' => $option->getImage(),
                                'label' => $option->getValue()
                            );
                        }

                        $images = array();
                        foreach($attribute->getPrices() as $price){
                            if (isset($options[$price['value_index']]) && $options[$price['value_index']]['image']){
                                $images[] = sprintf(
                                    '<img src="%s" width="%d" title="%s" origin="%s"/>',
                                    $options[$price['value_index']]['image'],
                                    $width,
                                    $options[$price['value_index']]['label'],
                                    isset($productImages[$productAttribute->getId()][$price['value_index']]) ? $productImages[$productAttribute->getId()][$price['value_index']] : ''
                                );
                            }
                        }
                        $attrs[] = sprintf('<div class="attr-image-%s">%s</div>', $productAttribute->getAttributeCode(), implode('', $images));
                    }
                }

                return sprintf('<div class="attr-image">%s</div>', implode('', $attrs));
            }else{
                $attributes = Mage::getSingleton('eav/config')
                    ->getEntityType(Mage_Catalog_Model_Product::ENTITY)
                    ->getAttributeCollection()
                    ->addFieldToFilter('used_in_product_listing', 1)
                    ->addFieldToFilter('frontend_input', 'select');

                foreach ($attributes as $attribute){
                    $optionCollection = Mage::getResourceModel('eav/entity_attribute_option_collection')
                        ->setAttributeFilter($attribute->getAttributeId())
                        ->setStoreFilter()
                        ->load();

                    foreach ($optionCollection as $option){
                        if ($option->getImage() && $product->getData($attribute->getAttributeCode()) == $option->getOptionId()){
                            $attrs[] = sprintf(
                                '<img src="%s" width="%d" title="%s" class=""/>',
                                $option->getImage(),
                                $width,
                                $option->getValue()
                            );
                        }
                    }
                }
            }

            return sprintf('<div class="attr-image">%s</div>', implode('', $attrs));
        }
    }

    public function getCloudZoomConfig($rel=false){
        $config['zoomWidth'] = is_numeric(Mage::getStoreConfig('dgtattribute/czoom/width'))?Mage::getStoreConfig('dgtattribute/czoom/width'):'auto';
        $config['zoomHeight'] = is_numeric(Mage::getStoreConfig('dgtattribute/czoom/height'))?Mage::getStoreConfig('dgtattribute/czoom/height'):'auto';
        $config['position'] = Mage::getStoreConfig('dgtattribute/czoom/position')?Mage::getStoreConfig('dgtattribute/czoom/position'):'right';
        $config['adjustX'] = is_numeric(Mage::getStoreConfig('dgtattribute/czoom/adjustX'))?Mage::getStoreConfig('dgtattribute/czoom/adjustX'):0;
        $config['adjustY'] = is_numeric(Mage::getStoreConfig('dgtattribute/czoom/adjustY'))?Mage::getStoreConfig('dgtattribute/czoom/adjustY'):0;
        if ($rel){
            $out = array();
            foreach ($config as $k=>$v){
                if (is_numeric($v)) $out[] = sprintf("%s:%d", $k, $v);
                else $out[] = sprintf("%s:'%s'", $k, $v);
            }
            return implode(',', $out);
        }else return $config;
    }
}