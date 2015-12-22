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
class DGTThemes_DGTYaris_Model_System_Config_Source_Layout_Header_Header
{

    public function toOptionArray()
    {
        return array(
            array('value' => 'layout1', 'label' => Mage::helper('adminhtml')->__('Layout 1'))
        );
    }

}