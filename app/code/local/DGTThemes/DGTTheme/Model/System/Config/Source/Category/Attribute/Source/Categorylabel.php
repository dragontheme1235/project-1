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

class DGTThemes_DGTTheme_Model_System_Config_Source_Category_Attribute_Source_CategoryLabel
	extends Mage_Eav_Model_Entity_Attribute_Source_Abstract
{
	protected $_options;
	
	/**
     * Get list of existing category labels
     */
	public function getAllOptions()
	{
		$cfg = Mage::helper('dgtyaris');
		
		if (!$this->_options)
		{	
			$this->_options[] =
					array('value' => '', 'label' => " ");
					
			if ($tmp = trim($cfg->getCfg('menu/label1')))
			{
				$this->_options[] =
					array('value' => 'label1', 'label' => $tmp);
			}
			if ($tmp = trim($cfg->getCfg('menu/label2')))
			{
				$this->_options[] =
					array('value' => 'label2', 'label' => $tmp);
			}
        }
        return $this->_options;
    }
}
