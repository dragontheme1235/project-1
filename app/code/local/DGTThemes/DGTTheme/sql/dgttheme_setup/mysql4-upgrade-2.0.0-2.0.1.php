<?php
/**
 *
 * ------------------------------------------------------------------------------
 * @category     ARW
 * @package      ARW_arexworks
 * ------------------------------------------------------------------------------
 * @copyright    Copyright (C) 2008-2013 arexworks.com. All Rights Reserved.
 * @license      GNU General Public License version 2 or later;
 * @author       arexworks.com
 * @email        support@arexworks.com
 * ------------------------------------------------------------------------------
 *
 */
?>
<?php
$installer = $this;
$installer->startSetup();

$installer->addAttribute('catalog_category', 'dgtmenu_category_image', array(
    "type"     => "varchar",
    "backend"  => "catalog/category_attribute_backend_image",
    "frontend" => "",
    "label"    => "Image Category",
    "input"    => "image",
    "class"    => "",
    "source"   => "",
    "global"   => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
    "visible"  => true,
    "required" => false,
    "user_defined"  => false,
    "default" => "",
    "searchable" => false,
    "filterable" => false,
    "comparable" => false,
    'group'         => 'Main Menu',
    "visible_on_front"  => false,
    "unique"     => false,
    "note"       => ""
));


$installer->endSetup();