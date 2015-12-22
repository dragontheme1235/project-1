<?php
/**
 * @category    DGT
 * @package     DGT_Widget
 * Copyright (C) 2014-2015 dragontheme.com. All Rights Reserved.
 * @license     GNU General Public License version 2 or later
 * @author      dragontheme.com
 * @email       support@dragontheme.com
 */

class DGT_Widget_CollectionController extends Mage_Core_Controller_Front_Action{
    public function getAction(){
        //if (!$this->_validateFormKey()) return null;
        if (!$this->getRequest()->isPost()) return null;

        $type   = $this->getRequest()->getPost('type');
        $value  = $this->getRequest()->getPost('value');

        if (!$type && !$value) return null;

        $limit      = $this->getRequest()->getPost('limit', 10);
        $carousel   = $this->getRequest()->getPost('carousel', 0);
        $column     = $this->getRequest()->getPost('column', 4);
        $columnslider     = $this->getRequest()->getPost('columnslider', 3);
        $countdown     = $this->getRequest()->getPost('countdown', 0);
        $row        = $this->getRequest()->getPost('row', 1);
        $cid        = $this->getRequest()->getPost('cid');
        $template   = $this->getRequest()->getPost('template', 'dgt/widget/collection.phtml');

        /* @var $helper DGT_Widget_Helper_Data */
        $helper = Mage::helper('dgtwidget');
        /* @var $block DGT_Widget_Block_Widget_Collection */
        $block = $this->getLayout()->createBlock('dgtwidget/widget_collection');
        $params = array();

        if ($cid){
            $params['category_ids'] = explode(',', $cid);
        }

        $block->setTemplate($template);
        $block->setData(array(
            'row'           => $row,
            'column'        => $column,
            'columnslider'        => $columnslider,
            'countdown'        => $countdown,
            'carousel'      => $carousel,
            'collection'    => $helper->getProductCollection($type, $value, $params, $limit)
        ));

        return $this->getResponse()->setBody($block->toHtml());
    }
}
