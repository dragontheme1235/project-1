<?php
/**
 * @category    DGT
 * @package     DGT_Filter
 * @copyright   Copyright (C) 2014-2015 dragontheme.com. All Rights Reserved.
 * @license     GNU General Public License version 2 or later
 * @author      dragontheme.com
 * @email       support@dragontheme.com
 */

class DGT_Filter_Helper_Data extends Mage_Core_Helper_Abstract{
    public function getConfig($path=null){
        if ($path) return Mage::getStoreConfig($path);
        else{
            $module = Mage::app()->getRequest()->getModuleName();
            $bar    = $this->getConfig('dgtfilter/general/bar');
            return Mage::helper('core')->jsonEncode(
                array(
                    'mainDOM'   => trim($this->getConfig("dgtfilter/{$module}/main_selector")),
                    'layerDOM'  => trim($this->getConfig("dgtfilter/{$module}/layer_selector")),
                    'enable'    => (bool)$this->getConfig("dgtfilter/{$module}/enable"),
                    'bar'       => (bool)$bar
                )
            );
        }
    }

    public function isPriceEnable(){
        $module = Mage::app()->getRequest()->getModuleName();
        return $this->getConfig("dgtfilter/{$module}/price");
    }
}
