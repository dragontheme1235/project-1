<?php
?>
<?php

class DGTThemes_DGTTheme_Model_System_Config_Source_Category_Attribute_Source_Categoryicon extends Mage_Eav_Model_Entity_Attribute_Source_Abstract
{
	protected $_options;
	
	/**
     * Get list of existing category labels
     */
	public function getAllOptions()
	{
		if (!$this->_options)
		{
            return array(
				array('value'=>'',                      'label'=>''),
                array('value'=>'fa-star-o',             'label'=>Mage::helper('adminhtml')->__('Star')),
                array('value'=>'fa-clock-o',            'label'=>Mage::helper('adminhtml')->__('Clock')),
                array('value'=>'fa-circle-o',           'label'=>Mage::helper('adminhtml')->__('Circle')),
                array('value'=>'fa-question-circle',    'label'=>Mage::helper('adminhtml')->__('Question Circle')),
                array('value'=>'fa-dot-circle-o',       'label'=>Mage::helper('adminhtml')->__('Dot Circle')),
                array('value'=>'fa-money',              'label'=>Mage::helper('adminhtml')->__('Money')),
                array('value'=>'fa-ticket',             'label'=>Mage::helper('adminhtml')->__('Ticket')),
                array('value'=>'fa-eur',                'label'=>Mage::helper('adminhtml')->__('Eur')),
				array('value'=>'fa-youtube-play',       'label'=>Mage::helper('adminhtml')->__('Youtube Play')),
				array('value'=>'fa-car',                'label'=>Mage::helper('adminhtml')->__('Car')),
                array('value'=>'fa-bolt',               'label'=>Mage::helper('adminhtml')->__('Bolt')),
                array('value'=>'fa-exclamation',        'label'=>Mage::helper('adminhtml')->__('Exclamation')),
                array('value'=>'fa-gift',               'label'=>Mage::helper('adminhtml')->__('Gift')),
                array('value'=>'fa-map-marker',         'label'=>Mage::helper('adminhtml')->__('Map Marker')),
                array('value'=>'fa-thumbs-up',          'label'=>Mage::helper('adminhtml')->__('Thumbs Up')),
                array('value'=>'fa-university',         'label'=>Mage::helper('adminhtml')->__('University')),
                array('value'=>'fa-anchor',             'label'=>Mage::helper('adminhtml')->__('Anchor')),
                array('value'=>'fa-cube',               'label'=>Mage::helper('adminhtml')->__('Cube')),
                array('value'=>'fa-trophy',             'label'=>Mage::helper('adminhtml')->__('Trophy')),
                array('value'=>'fa-suitcase',           'label'=>Mage::helper('adminhtml')->__('Suitcase')),
                array('value'=>'fa-tablet',             'label'=>Mage::helper('adminhtml')->__('Tablet')),
                array('value'=>'fa-life-ring',          'label'=>Mage::helper('adminhtml')->__('Life Ring')),
                array('value'=>'fa-headphones',         'label'=>Mage::helper('adminhtml')->__('Headphones')),
                array('value'=>'fa-globe',              'label'=>Mage::helper('adminhtml')->__('Globe')),
                array('value'=>'fa-compass',            'label'=>Mage::helper('adminhtml')->__('Compass')),
                array('value'=>'fa-gavel',              'label'=>Mage::helper('adminhtml')->__('Gavel')),
                array('value'=>'fa-microphone',         'label'=>Mage::helper('adminhtml')->__('Microphone')),
                array('value'=>'fa-recycle',            'label'=>Mage::helper('adminhtml')->__('Recycle')),
                array('value'=>'fa-rocket',             'label'=>Mage::helper('adminhtml')->__('Rocket')),
                array('value'=>'fa-plane',              'label'=>Mage::helper('adminhtml')->__('Plane')),
                array('value'=>'fa-tree',               'label'=>Mage::helper('adminhtml')->__('Tree')),
                array('value'=>'fa-umbrella',           'label'=>Mage::helper('adminhtml')->__('Umbrella')),
                array('value'=>'fa-video-camera',       'label'=>Mage::helper('adminhtml')->__('Video Camera')),
                array('value'=>'fa-male',               'label'=>Mage::helper('adminhtml')->__('Male')),
                array('value'=>'fa-female',             'label'=>Mage::helper('adminhtml')->__('Female')),
                array('value'=>'fa-child',              'label'=>Mage::helper('adminhtml')->__('Child')),
                array('value'=>'fa-bell',               'label'=>Mage::helper('adminhtml')->__('Bell')),
                array('value'=>'fa-asterisk',           'label'=>Mage::helper('adminhtml')->__('Asterisk')),
                array('value'=>'fa-bookmark',           'label'=>Mage::helper('adminhtml')->__('Bookmark')),
                array('value'=>'fa-camera-retro',       'label'=>Mage::helper('adminhtml')->__('Camera Retro'))
            );
        }
		return $this->_options;
    }
}
