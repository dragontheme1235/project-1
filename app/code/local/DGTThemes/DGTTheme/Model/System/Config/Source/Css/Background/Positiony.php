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

class DGTThemes_DGTTheme_Model_System_Config_Source_Css_Background_Positiony
{
    public function toOptionArray()
    {
		return array(
			array('value' => 'top',		'label' => Mage::helper('adminhtml')->__('top')),
            array('value' => 'center',	'label' => Mage::helper('adminhtml')->__('center')),
            array('value' => 'bottom',	'label' => Mage::helper('adminhtml')->__('bottom'))
        );
    }
}