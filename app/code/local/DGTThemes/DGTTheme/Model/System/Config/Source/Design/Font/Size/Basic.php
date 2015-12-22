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
class DGTThemes_DGTTheme_Model_System_Config_Source_Design_Font_Size_Basic
{
    public function toOptionArray()
    {
		return array(
			array('value' => '8px',	'label' => Mage::helper('adminhtml')->__('8 px')),
			array('value' => '9px',	'label' => Mage::helper('adminhtml')->__('9 px')),
			array('value' => '10px',	'label' => Mage::helper('adminhtml')->__('10 px')),
			array('value' => '11px',	'label' => Mage::helper('adminhtml')->__('11 px')),
			array('value' => '12px',	'label' => Mage::helper('adminhtml')->__('12 px')),
			array('value' => '13px',	'label' => Mage::helper('adminhtml')->__('13 px')),
			array('value' => '14px',	'label' => Mage::helper('adminhtml')->__('14 px')),
			array('value' => '15px',	'label' => Mage::helper('adminhtml')->__('15 px')),
            array('value' => '16px',	'label' => Mage::helper('adminhtml')->__('16 px')),
            array('value' => '17px',	'label' => Mage::helper('adminhtml')->__('17 px')),
            array('value' => '18px',	'label' => Mage::helper('adminhtml')->__('18 px')),
            array('value' => '19px',	'label' => Mage::helper('adminhtml')->__('19 px')),
            array('value' => '20px',	'label' => Mage::helper('adminhtml')->__('20 px'))
        );
    }
}