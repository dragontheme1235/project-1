<?php
/**
 * @category    DGT
 * @package     DGT_Widget
 * Copyright (C) 2014-2015 dragontheme.com. All Rights Reserved.
 * @license     GNU General Public License version 2 or later
 * @author      dragontheme.com
 * @email       support@dragontheme.com
 */

class DGT_Widget_Block_Widget extends Mage_Catalog_Block_Product_Abstract implements Mage_Widget_Block_Interface {
    const CACHE_GROUP = 'dgt_widget';

    protected $_productCollection;

    protected function _construct(){
        parent::_construct();
        $this->setData('cache_tags', array(self::CACHE_GROUP, Mage_Core_Block_Template::CACHE_GROUP));
    }

    public function getCacheLifetime(){
        return $this->getData('cache') ? (int)$this->getData('cache') : null;
    }

    public function getCacheKeyInfo(){
        return array(
            self::CACHE_GROUP,
            Mage::app()->getStore()->getId(),
            Mage::getSingleton('customer/session')->getCustomerGroupId(),
            $this->getData('widget_type'),
            $this->getData('widget_tab'),
            $this->getData('collections'),
            $this->getData('category_ids'),
            $this->getData('product_ids'),
            $this->getData('attribute'),
            $this->getData('attribute_options'),
            $this->getData('attribute_link'),
            $this->getData('block_ids'),
            $this->getData('mode'),
            $this->getData('limit'),
            $this->getData('scroll'),
            $this->getData('row'),
            $this->getData('column'),
        );
    }

    protected function _beforeToHtml(){
        if ($this->getTemplate() == 'dgt/widget/default.phtml'){
            switch ($this->getData('widget_type')){
                case 'product':
                    switch ($this->getData('mode')){
                        case 'related':
                            $this->setTemplate('dgt/widget/related.phtml');
                            break;
                        default:
                            $this->setTemplate('dgt/widget/product.phtml');
                            break;
                    }
                    switch ($this->getData('widget_tab')){
                        case 'categories':
                        case 'collections':
                            $this->setTemplate('dgt/widget/tab.phtml');
                            break;
                    }
                    break;
                case 'attribute':
                    $this->setTemplate('dgt/widget/attribute.phtml');
                    break;
                case 'block':
                    $this->setTemplate('dgt/widget/block.phtml');
                    break;
                case 'category':
                    $this->setTemplate('dgt/widget/category.phtml');
                    break;
            }
        }
        return parent::_beforeToHtml();
    }

    public function getCategories(){
        if (!$this->getData('category_ids')) return array();

        $categories = array();
        foreach (explode(',', $this->getData('category_ids')) as $categoryId){
            /* @var $category Mage_Catalog_Model_Category */
            $category = Mage::getModel('catalog/category')
                ->setStore(Mage::app()->getStore())
                ->load($categoryId, array('name', 'image', 'thumbnail'));
            if ($category->getId()){
                $categories[] = array(
                    'url'   => $category->getUrl(),
                    'label' => $category->getName(),
                    'image' => $category->getThumbnail() ? Mage::getBaseUrl('media'). 'catalog/category/' . $category->getThumbnail() : '',
                    'count' => $category->getProductCount()
                );
            }
        }

        return $categories;
    }

    public function getTabs(){
        $tabs = array();
        $type = $this->getData('widget_tab');
        $labels = explode('||', $this->getData('labels'));

        switch ($type){
            case 'categories':
                $categoryIds = explode(',', $this->getData('category_ids'));
                foreach ($categoryIds as $index => $categoryId){
                    /* @var $categoryModel Mage_Catalog_Model_Category */
                    $categoryModel = Mage::getModel('catalog/category')->load($categoryId, array('name'));
                    if ($categoryModel->getId()){
                        $tabs[] = array(
                            'type'  => 'category',
                            'id'    => 'category-' . $categoryModel->getId(),
                            'label' => isset($labels[$index]) && $labels[$index] ? $labels[$index] : $categoryModel->getName(),
                            'value' => $categoryModel->getId()
                        );
                    }
                }
                break;
            case 'collections':
                $collectionNames = $this->getData('collections');
                if (!is_array($collectionNames)) $collectionNames = explode(',', $this->getData('collections'));
                foreach ($collectionNames as $index => $collectionName){
                    $tabs[] = array(
                        'type'  => 'collection',
                        'id'    => 'collection-' . $collectionName,
                        'label' => isset($labels[$index]) && $labels[$index] ? $labels[$index] : $collectionName,
                        'value' => $collectionName
                    );
                }
                break;
        }

        return $tabs;
    }

    public function checkCollectionSize($type, $value){
        $collection = $this->_getProductCollection($type, $value);
        return $collection->count();
    }

    public function renderCollection($type, $value, $template='dgt/widget/collection.phtml'){
        /* @var $block DGT_Widget_Block_Widget_Collection */
        $block = $this->getLayout()->createBlock('dgtwidget/widget_collection');

        $block->setData(array(
            'row'           => $this->getConfig('row'),
            'column'        => $this->getConfig('column'),
            'columnslider'        => $this->getConfig('columnslider'),
            'countdown'        => $this->getConfig('countdown'),
            'carousel'      => $this->getConfig('scroll'),
            'collection'    => $this->_getProductCollection($type, $value)
        ));
        $block->setTemplate($template);

        return $block->toHtml();
    }

    protected function _getProductCollection($type, $value){
        if (!$this->_productCollection){
            /* @var $helper DGT_Widget_Helper_Data */
            $helper = Mage::helper('dgtwidget');
            $params = array();

            if ($this->getData('category_ids')){
                $params['category_ids'] = explode(',', $this->getData('category_ids'));
            }
            if ($this->getData('product_ids')){
                $params['product_ids'] = explode(',', $this->getData('product_ids'));
            }

            $this->_productCollection = $helper->getProductCollection($type, $value, $params, $this->getLimit());
        }

        return $this->_productCollection;
    }

    public function getLimit(){
        return is_numeric($this->getData('limit')) ? $this->getData('limit') : 10;
    }

    public function getBlocks(){
        $blocks     = array();
        $layout     = $this->getLayout();
        $storeId    = Mage::app()->getStore()->getId();

        $classes    = array();
        $order      = array();

        foreach (array('lg', 'md', 'sm', 'xs') as $l){
            foreach (explode('|', $this->getData('block_' . $l)) as $block){
                list($blockId, $column, $cls) = explode(',', $block);

                if (!isset($classes[$blockId])){
                    $classes[$blockId] = "col-{$l}-{$column} ";
                }else{
                    $classes[$blockId] .= "col-{$l}-{$column} ";
                }
                $classes[$blockId] .= "{$cls} ";

                if (!in_array($blockId, $order)){
                    $order[] = $blockId;
                }
            }
        }

        foreach ($order as $blockId){
            /* @var $collection Mage_Cms_Model_Resource_Block_Collection */
            $collection = Mage::getResourceModel('cms/block_collection')
                ->addFieldToFilter('identifier', array('eq' => $blockId));

            if ($collection->count()){
                /* @var $block Mage_Cms_Model_Block */
                $block = $collection->getFirstItem();
                $block->load($block->getId());
                $storeIds = $block->getStoreId();
                if ($block->getIsActive() && (in_array($storeId, $storeIds) || in_array(0, $storeIds))){
                    $blocks[] = array(
                        'class'     => isset($classes[$blockId]) ? $classes[$blockId] : '',
                        'content'   => $layout->createBlock('cms/block')->setStoreId()->setBlockId($blockId)->toHtml()
                    );
                }
            }
        }

        return $blocks;
    }

    public function getAttibuteOptions(){
        $showOptions = explode(',', $this->getData('attribute_options'));
        list($attributeId, $attributeCode) = explode(',' , $this->getData('attribute'));

        $optionCollection = Mage::getResourceModel('eav/entity_attribute_option_collection')
            ->setAttributeFilter($attributeId)
            ->setStoreFilter()
            ->load();

        $options = array();
        foreach ($optionCollection as $option){
            if (in_array($option->getId(), $showOptions)){
                if ($this->getData('attribute_link')){
                    $options[] = array(
                        'id'    => $option->getId(),
                        'label' => $option->getValue(),
                        'image' => $option->getImage() ?
                                (
                                    strpos($option->getImage(), 'http') === 0 ?
                                    $option->getImage() :
                                    Mage::getBaseUrl('media') . $option->getImage()
                                ):
                                null,
                        'link'  => $this->getUrl('catalogsearch/result/index', array('q' => $option->getValue()))
                    );
                }else{
                    $options[] = array(
                        'id'    => $option->getId(),
                        'label' => $option->getValue(),
                        'image' => $option->getImage() ?
                                (
                                    strpos($option->getImage(), 'http') === 0 ?
                                    $option->getImage() :
                                    Mage::getBaseUrl('media') . $option->getImage()
                                ):
                                null
                    );
                }
            }
        }

        return $options;
    }

    public function getConfig($name, $param=null){
        /* @var $helper Mage_Core_Helper_Data */
        $helper = Mage::helper('core');

        switch ($name){
            case 'countdown':
                return $helper->jsonEncode(array(
                    'enable'            => (bool) $this->getData('countdown'),
                    'yearText'          => Mage::helper('dgtwidget')->__('years'),
                    'monthText'         => Mage::helper('dgtwidget')->__('months'),
                    'weekText'          => Mage::helper('dgtwidget')->__('weeks'),
                    'dayText'           => Mage::helper('dgtwidget')->__('days'),
                    'hourText'          => Mage::helper('dgtwidget')->__('hours'),
                    'minText'           => Mage::helper('dgtwidget')->__('mins'),
                    'secText'           => Mage::helper('dgtwidget')->__('secs'),
                    'yearSingularText'  => Mage::helper('dgtwidget')->__('year'),
                    'monthSingularText' => Mage::helper('dgtwidget')->__('month'),
                    'weekSingularText'  => Mage::helper('dgtwidget')->__('week'),
                    'daySingularText'   => Mage::helper('dgtwidget')->__('day'),
                    'hourSingularText'  => Mage::helper('dgtwidget')->__('hour'),
                    'minSingularText'   => Mage::helper('dgtwidget')->__('min'),
                    'secSingularText'   => Mage::helper('dgtwidget')->__('sec'),
                    'engineSrc'         => Mage::getBaseUrl('js') . 'dgt/extensions/jquery/plugins/jquery.jcountdown.min.js'
                ));
                break;
            case 'carousel':
                return $helper->jsonEncode(array(
                    'items'         => is_numeric($this->getData('column')) ? (int) $this->getData('column') : 4,
                    'navigation'    => (bool) $this->getData('navigation'),
                    'navigationText'=> array($this->getData('navigation_prev'), $this->getData('navigation_next')),
                    'autoPlay'      => is_numeric($this->getData('autoplay')) ? (int) $this->getData('autoplay') : false,
                    'pagination'    => (bool) $this->getData('paging'),
                    'singleItem'    => $this->getData('column') == 1,
                    'itemsDesktop'  => array(1199, is_numeric($this->getData('column_lg')) ? (int) $this->getData('column_lg') : 3),
                    'itemsDesktopSmall' => array(991, is_numeric($this->getData('column_md')) ? (int) $this->getData('column_md') : 2),
                ));
                break;
            case 'widget_title':
                return $this->escapeHtml($this->getData('widget_title'));
                break;
            case 'id':
                return $helper->uniqHash(is_string($param) ? $param : 'dgt-widget-');
                break;
            case 'row':
                return is_numeric($this->getData('row')) ? (int) $this->getData('row') : 1;
                break;
            case 'column':
                return is_numeric($this->getData('column')) ? (int) $this->getData('column') : 4;
                break;
            case 'limit':
                return is_numeric($this->getData('limit')) ? (int) $this->getData('limit') : 1;
                break;
            case 'classes':
                return $this->getData('classes');
                break;
            default:
                return $this->getData($name);
        }
    }
}
