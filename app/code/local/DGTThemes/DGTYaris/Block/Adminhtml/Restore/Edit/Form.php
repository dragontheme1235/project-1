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
class DGTThemes_DGTYaris_Block_Adminhtml_Restore_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $isElementDisabled = false;
        $form = new Varien_Data_Form();

        $fieldset = $form->addFieldset('base_fieldset', array('legend'=>Mage::helper('adminhtml')->__('Restore Parameters')));

        if (!Mage::app()->isSingleStoreMode()) {
            $fieldset->addField('store_id', 'multiselect', array(
                'name'      => 'stores[]',
                'label'     => Mage::helper('cms')->__('Store View'),
                'title'     => Mage::helper('cms')->__('Store View'),
                'required'  => true,
                'values'    => Mage::getSingleton('adminhtml/system_store')->getStoreValuesForForm(false, true),
                'disabled'  => $isElementDisabled
            ));
        }
        else {
            $fieldset->addField('store_id', 'hidden', array(
                'name'      => 'stores[]',
                'value'     => 0
            ));
        }


        $form->setAction($this->getUrl('*/*/restore'));
        $form->setMethod('post');
        $form->setUseContainer(true);
        $form->setId('edit_form');

        $this->setForm($form);

        return parent::_prepareForm();
    }
}
