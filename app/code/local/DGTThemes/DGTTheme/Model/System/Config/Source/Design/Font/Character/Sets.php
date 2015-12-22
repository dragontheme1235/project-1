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
class DGTThemes_DGTTheme_Model_System_Config_Source_Design_Font_Character_Sets
{
    public function toOptionArray()
    {
        return array(
            array('value' => 'cyrillic-ext',	'label' => Mage::helper('adminhtml')->__('Cyrillic Extended (cyrillic-ext)')),
            array('value' => 'greek-ext',	    'label' => Mage::helper('adminhtml')->__('Greek Extended (greek-ext)')),
            array('value' => 'greek',	        'label' => Mage::helper('adminhtml')->__('Greek (greek)')),
            array('value' => 'vietnamese',	    'label' => Mage::helper('adminhtml')->__('Vietnamese (vietnamese)')),
            array('value' => 'latin-ext',	    'label' => Mage::helper('adminhtml')->__('Latin Extended (latin-ext)')),
            array('value' => 'cyrillic',	    'label' => Mage::helper('adminhtml')->__('Cyrillic (cyrillic)'))
        );
    }
}