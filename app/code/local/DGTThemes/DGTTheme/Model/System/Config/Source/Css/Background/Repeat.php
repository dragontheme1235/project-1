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

class DGTThemes_DGTTheme_Model_System_Config_Source_Css_Background_Repeat
{
    public function toOptionArray()
    {
		return array(
			array('value' => 'no-repeat',	'label' => Mage::helper('adminhtml')->__('no-repeat')),
            array('value' => 'repeat',		'label' => Mage::helper('adminhtml')->__('repeat')),
            array('value' => 'repeat-x',	'label' => Mage::helper('adminhtml')->__('repeat-x')),
			array('value' => 'repeat-y',	'label' => Mage::helper('adminhtml')->__('repeat-y'))
        );
    }
}