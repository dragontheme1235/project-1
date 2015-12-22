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
class DGTThemes_DGTTheme_Model_System_Config_Source_Category_Grid_Ratioimage
{

    public function toOptionArray()
    {
        return array(
            array('value'=>'original', 'label'=>Mage::helper('adminhtml')->__('Original')),
            array('value'=>'1:1', 'label'=>Mage::helper('adminhtml')->__('Square Rectangle')),
            array('value'=>'3:4', 'label'=>Mage::helper('adminhtml')->__('Horizontal Rectangle')),
            array('value'=>'4:3', 'label'=>Mage::helper('adminhtml')->__('Vertical Rectangle'))
        );
    }

}