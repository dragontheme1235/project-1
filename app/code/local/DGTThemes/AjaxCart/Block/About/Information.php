<?php
/**
 *
 * ------------------------------------------------------------------------------
 * @category     Mono
 * @package      DGT_AjaxCart
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
class DGTThemes_AjaxCart_Block_About_Information extends Mage_Adminhtml_Block_System_Config_Form_Fieldset
{
    public function render(Varien_Data_Form_Element_Abstract $element)
    {		
	$html = $this->_getHeaderHtml($element);		
	$html.= $this->_getFieldHtml($element);        
        $html .= $this->_getFooterHtml($element);
        return $html;
    }   
    protected function _getFieldHtml($fieldset)
    {
	$content = 'Ajax Cart version : 1.0.0<br/>Author : <a href="http://www.dragontheme.com" title="Dragon Theme">dragontheme.com</a><br />Copyright &copy; 2015- dragontheme.com';
	return $content;
    }
}