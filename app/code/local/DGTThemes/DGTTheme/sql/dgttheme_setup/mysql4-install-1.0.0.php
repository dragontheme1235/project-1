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
$installer = $this;
$installer->startSetup();

$installer->addAttribute('catalog_category', 'dgtmenu_cat_block_right', array(
    'group'				=> 'Main Menu',
    'label'				=> 'Block Right',
    'note'				=> "This field is applicable only for top-level categories.",
    'type'				=> 'text',
    'input'				=> 'textarea',
    'visible'			=> true,
    'required'			=> false,
    'backend'			=> '',
    'frontend'			=> '',
    'searchable'		=> false,
    'filterable'		=> false,
    'comparable'		=> false,
    'user_defined'		=> true,
    'visible_on_front'	=> true,
    'wysiwyg_enabled'	=> true,
    'is_html_allowed_on_front'	=> true,
    'global'			=> Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
));
$installer->updateAttribute('catalog_category', 'dgtmenu_cat_block_right', 'is_wysiwyg_enabled', 1);
$installer->updateAttribute('catalog_category', 'dgtmenu_cat_block_right', 'is_html_allowed_on_front', 1);

$installer->addAttribute('catalog_category', 'dgtmenu_proportions_right', array(
    'group'				=> 'Main Menu',
    'label'				=> 'Proportions: Block Right',
    'note'				=> "Proportions block Block Right. This field is applicable only for top-level categories.",
    'type'				=> 'varchar',
    'input'				=> 'select',
    'source'			=> 'dgttheme/system_config_source_category_attribute_source_block_proportions',
    'visible'			=> true,
    'required'			=> false,
    'backend'			=> '',
    'frontend'			=> '',
    'searchable'		=> false,
    'filterable'		=> false,
    'comparable'		=> false,
    'user_defined'		=> true,
    'visible_on_front'	=> true,
    'wysiwyg_enabled'	=> false,
    'is_html_allowed_on_front'	=> false,
    'global'			=> Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
));

$installer->addAttribute('catalog_category', 'dgtmenu_cat_block_left', array(
    'group'				=> 'Main Menu',
    'label'				=> 'Block Left',
    'note'				=> "This field is applicable only for top-level categories.",
    'type'				=> 'text',
    'input'				=> 'textarea',
    'visible'			=> true,
    'required'			=> false,
    'backend'			=> '',
    'frontend'			=> '',
    'searchable'		=> false,
    'filterable'		=> false,
    'comparable'		=> false,
    'user_defined'		=> true,
    'visible_on_front'	=> true,
    'wysiwyg_enabled'	=> true,
    'is_html_allowed_on_front'	=> true,
    'global'			=> Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
));
$installer->updateAttribute('catalog_category', 'dgtmenu_cat_block_left', 'is_wysiwyg_enabled', 1);
$installer->updateAttribute('catalog_category', 'dgtmenu_cat_block_left', 'is_html_allowed_on_front', 1);

$installer->addAttribute('catalog_category', 'dgtmenu_proportions_left', array(
    'group'				=> 'Main Menu',
    'label'				=> 'Proportions: Block Left',
    'note'				=> "Proportions block Block Left. This field is applicable only for top-level categories.",
    'type'				=> 'varchar',
    'input'				=> 'select',
    'source'			=> 'dgttheme/system_config_source_category_attribute_source_block_proportions',
    'visible'			=> true,
    'required'			=> false,
    'backend'			=> '',
    'frontend'			=> '',
    'searchable'		=> false,
    'filterable'		=> false,
    'comparable'		=> false,
    'user_defined'		=> true,
    'visible_on_front'	=> true,
    'wysiwyg_enabled'	=> false,
    'is_html_allowed_on_front'	=> false,
    'global'			=> Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
));

$installer->addAttribute('catalog_category', 'dgtmenu_cat_columns', array(
    'group'				=> 'Main Menu',
    'label'				=> 'Categories Columns',
    'note'				=> "This field is applicable only for top-level categories.",
    'type'				=> 'varchar',
    'input'				=> 'select',
    'source'			=> 'dgttheme/system_config_source_category_attribute_source_block_proportions',
    'visible'			=> true,
    'required'			=> false,
    'backend'			=> '',
    'frontend'			=> '',
    'searchable'		=> false,
    'filterable'		=> false,
    'comparable'		=> false,
    'user_defined'		=> true,
    'visible_on_front'	=> true,
    'wysiwyg_enabled'	=> false,
    'is_html_allowed_on_front'	=> false,
    'global'			=> Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
));

$installer->addAttribute('catalog_category', 'dgtmenu_cat_groups', array(
    'group'				=> 'Main Menu',
    'label'				=> 'Category Menu Type',
    'note'				=> "Show subcategories by. This field is applicable only for top-level categories.",
    'type'				=> 'varchar',
    'input'				=> 'select',
    'source'			=> 'dgttheme/system_config_source_category_attribute_source_block_types',
    'visible'			=> true,
    'required'			=> false,
    'backend'			=> '',
    'frontend'			=> '',
    'searchable'		=> false,
    'filterable'		=> false,
    'comparable'		=> false,
    'user_defined'		=> true,
    'visible_on_front'	=> true,
    'wysiwyg_enabled'	=> false,
    'is_html_allowed_on_front'	=> false,
    'global'			=> Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
));

$installer->addAttribute('catalog_category', 'dgtmenu_cat_block_top', array(
    'group'				=> 'Main Menu',
    'label'				=> 'Block Top',
    'type'				=> 'text',
    'input'				=> 'textarea',
    'visible'			=> true,
    'required'			=> false,
    'backend'			=> '',
    'frontend'			=> '',
    'searchable'		=> false,
    'filterable'		=> false,
    'comparable'		=> false,
    'user_defined'		=> true,
    'visible_on_front'	=> true,
    'wysiwyg_enabled'	=> true,
    'is_html_allowed_on_front'	=> true,
    'global'			=> Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
));
$installer->updateAttribute('catalog_category', 'dgtmenu_cat_block_top', 'is_wysiwyg_enabled', 1);
$installer->updateAttribute('catalog_category', 'dgtmenu_cat_block_top', 'is_html_allowed_on_front', 1);


$installer->addAttribute('catalog_category', 'dgtmenu_cat_block_bottom', array(
    'group'				=> 'Main Menu',
    'label'				=> 'Block Bottom',
    'type'				=> 'text',
    'input'				=> 'textarea',
    'visible'			=> true,
    'required'			=> false,
    'backend'			=> '',
    'frontend'			=> '',
    'searchable'		=> false,
    'filterable'		=> false,
    'comparable'		=> false,
    'user_defined'		=> true,
    'visible_on_front'	=> true,
    'wysiwyg_enabled'	=> true,
    'is_html_allowed_on_front'	=> true,
    'global'			=> Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
));
$installer->updateAttribute('catalog_category', 'dgtmenu_cat_block_bottom', 'is_wysiwyg_enabled', 1);
$installer->updateAttribute('catalog_category', 'dgtmenu_cat_block_bottom', 'is_html_allowed_on_front', 1);

$installer->addAttribute('catalog_category', 'dgtmenu_cat_label', array(
    'group'				=> 'Main Menu',
    'label'				=> 'Category Label',
    'note'				=> "Labels have to be defined in menu settings",
    'type'				=> 'varchar',
    'input'				=> 'select',
    'source'			=> 'dgttheme/system_config_source_category_attribute_source_categorylabel',
    'visible'			=> true,
    'required'			=> false,
    'backend'			=> '',
    'frontend'			=> '',
    'searchable'		=> false,
    'filterable'		=> false,
    'comparable'		=> false,
    'user_defined'		=> true,
    'visible_on_front'	=> true,
    'wysiwyg_enabled'	=> false,
    'is_html_allowed_on_front'	=> false,
    'global'			=> Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
));


$installer->endSetup();