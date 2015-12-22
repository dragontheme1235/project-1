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
class DGTThemes_DGTYaris_Block_Adminhtml_Support extends Mage_Adminhtml_Block_Template
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('dgtyaris/support.phtml');
    }
}