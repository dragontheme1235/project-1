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
class DGTThemes_DGTTheme_Model_System_Config_Source_Category_Altimagecolumn
{

    public function toOptionArray()
    {
        return array(
            array('value'=>'label', 'label'=>Mage::helper('adminhtml')->__('Label')),
            array('value'=>'position', 'label'=>Mage::helper('adminhtml')->__('Sort Order'))
        );
    }

}