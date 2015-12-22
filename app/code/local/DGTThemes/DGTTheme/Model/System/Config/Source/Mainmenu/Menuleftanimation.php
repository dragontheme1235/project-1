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
class DGTThemes_DGTTheme_Model_System_Config_Source_Mainmenu_Menuleftanimation
{

    public function toOptionArray()
    {
        return array(
            array('value'=>'show', 'label'=>Mage::helper('adminhtml')->__('Show/Hide')),
            array('value'=>'slide', 'label'=>Mage::helper('adminhtml')->__('Slide')),
            array('value'=>'slideWidth', 'label'=>Mage::helper('adminhtml')->__('Slide Width')),
            array('value'=>'moveLeft', 'label'=>Mage::helper('adminhtml')->__('Move Left')),
            array('value'=>'fade', 'label'=>Mage::helper('adminhtml')->__('Fade')),
        );
    }

}
