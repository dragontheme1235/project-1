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

class DGTThemes_DGTTheme_Model_System_Config_Source_Category_Attribute_Source_Alignment_Align
	extends Mage_Eav_Model_Entity_Attribute_Source_Abstract
{
	public function getAllOptions()
	{
		if (!$this->_options)
		{
			$this->_options = array(
				array('value' => 'left',		'label' => 'Left'),
                array('value' => 'right',		'label' => 'Right'),
                array('value' => 'center',		'label' => 'Center'),
                array('value' => 'justify',		'label' => 'Justify'),
			);
        }
		return $this->_options;
    }
}
