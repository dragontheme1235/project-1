<?php
/**
 * @category    DGT
 * @package     DGT_Filter
 * Copyright (C) 2014-2015 dragontheme.com. All Rights Reserved.
 * @license     GNU General Public License version 2 or later
 * @author      dragontheme.com
 * @email       support@dragontheme.com
 */

class DGT_Filter_Block_Catalog_Layer_Filter_Discount extends Mage_Catalog_Block_Layer_Filter_Abstract{
    public function __construct(){
        parent::__construct();
        $this->_filterModelName = 'dgtfilter/layer_filter_discount';
    }
}
