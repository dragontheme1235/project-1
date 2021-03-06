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
class DGTThemes_DGTTheme_Model_System_Config_Source_Layout_Element_Replacewithblock
{

    public function toOptionArray()
    {
        return array(
            array('value' => 0, 'label' => Mage::helper('adminhtml')->__('Disable Completely')),
            array('value' => 1, 'label' => Mage::helper('adminhtml')->__('Don\'t Replace With Static Block')),
            array('value' => 2, 'label' => Mage::helper('adminhtml')->__('If Empty, Replace With Static Block')),
			array('value' => 3, 'label' => Mage::helper('adminhtml')->__('Replace With Static Block'))
        );
    }

}