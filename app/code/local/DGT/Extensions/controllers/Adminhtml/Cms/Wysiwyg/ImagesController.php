<?php
/**
 * @category    DGT
 * @package     DGT_Extensions
 * Copyright (C) 2014-2015 dragontheme.com. All Rights Reserved.
 * @license     GNU General Public License version 2 or later
 * @author      dragontheme.com
 * @email       support@dragontheme.com
 */

require_once 'Mage/Adminhtml/controllers/Cms/Wysiwyg/ImagesController.php';

class DGT_Extensions_Adminhtml_Cms_Wysiwyg_ImagesController extends Mage_Adminhtml_Cms_Wysiwyg_ImagesController{
    public function indexAction(){
        if ($this->getRequest()->getParam('static_urls_allowed')){
            $this->_getSession()->setStaticUrlsAllowed(true);
        }
        parent::indexAction();
    }

    public function onInsertAction(){
        parent::onInsertAction();
        $this->_getSession()->setStaticUrlsAllowed();
    }
}
