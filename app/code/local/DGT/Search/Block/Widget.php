<?php
/**
 * @category    DGT
 * @package     DGT_Search
 * Copyright (C) 2014-2015 dragontheme.com. All Rights Reserved.
 * @license     GNU General Public License version 2 or later
 * @author      dragontheme.com
 * @email       support@dragontheme.com
 */

class DGT_Search_Block_Widget extends Mage_Core_Block_Template{
    protected function _construct(){
        parent::_construct();
        if (Mage::getStoreConfigFlag('dgtsearch/general/enable')){
            $this->setTemplate('dgt/search/widget.phtml');
        }else{
            $this->setTemplate('catalogsearch/form.mini.phtml');
        }
    }

    public function getCategories(){
        $categories = array();
        $rootCategory = Mage::app()->getGroup()->getRootCategoryId();

        $collection = Mage::getResourceModel('catalog/category_collection')
            ->setStore(Mage::app()->getStore())
            ->addIsActiveFilter()
            ->addNameToResult()
            ->addFieldToFilter('parent_id', array('eq' => $rootCategory));

        foreach ($collection as $category){
            $categories[$category->getId()] = $this->escapeHtml($category->getName());
        }

        return $categories;
    }

    public function getCurrentCategory(){
        $module = $this->getRequest()->getModuleName();
        if ($module == 'catalogsearch'){
            return $this->getRequest()->getParam('cat');
        }
        return null;
    }
}
