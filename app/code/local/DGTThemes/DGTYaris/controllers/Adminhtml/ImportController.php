<?php
/**
 *
 * ------------------------------------------------------------------------------
 * @category     Mono
 * @package DGT Framework
 * ------------------------------------------------------------------------------
 * @copyright    Copyright (C) 2014-2015 dragontheme.com. All Rights Reserved.
 * @license      GNU General Public License version 2 or later;
 * @author       dragontheme.com
 * @email        support@dragontheme.com
 * ------------------------------------------------------------------------------
 *
 */
?>
<?php
class DGTThemes_DGTYaris_Adminhtml_ImportController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction() {
        $this->getResponse()->setRedirect($this->getUrl("adminhtml/system_config/edit/section/dgtyaris/"));
    }
    public function blocksAction() {
        $config = Mage::helper('dgtyaris')->getCfg('install/overwrite_blocks');
        Mage::getSingleton('dgtyaris/import_cms')->importCmsItems('cms/block', 'blocks', $config);
        $this->getResponse()->setRedirect($this->getUrl("adminhtml/system_config/edit/section/dgtyaris/"));
    }
    public function pagesAction() {
        $config = Mage::helper('dgtyaris')->getCfg('install/overwrite_pages');
        Mage::getSingleton('dgtyaris/import_cms')->importCmsItems('cms/page', 'pages', $config);
        $this->getResponse()->setRedirect($this->getUrl("adminhtml/system_config/edit/section/dgtyaris/"));
    }
    public function widgetsAction() {
        Mage::getSingleton('dgtyaris/import_cms')->importWidgetItems('widget/widget_instance', 'widgets', false);
        $this->getResponse()->setRedirect($this->getUrl("adminhtml/system_config/edit/section/dgtyaris/"));
    }
}
