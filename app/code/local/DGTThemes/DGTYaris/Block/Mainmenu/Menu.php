<?php
/**
 *
 * ------------------------------------------------------------------------------
 * @category     Mono
 * @package      DGT Framework
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
class DGTThemes_DGTYaris_Block_Mainmenu_Menu extends Mage_Catalog_Block_Navigation
{
    protected $_column;
    protected $_isMomenu;
    protected $_isSmart;

    protected function _construct()
    {
        parent::_construct();
    }

    protected function _renderCategoryMenuGroupItemHtml($category, $level = 0, $isLast = false, $isFirst = false,
                                                   $isOutermost = false, $outermostItemClass = '', $childrenWrapClass = '', $noEventAttributes = false)
    {
        if (!$category->getIsActive()) {
            return '';
        }
        $catdetail = $this->_getCatInfo($category->getId());
        if($catdetail->getData('dgtmenu_is_category')==0 && $level==0){
            return '';
        }
        $html = array();

        // get all children
        if (Mage::helper('catalog/category_flat')->isEnabled()) {
            $children = (array)$category->getChildrenNodes();
            $childrenCount = count($children);
        } else {
            $children = $category->getChildren();
            $childrenCount = $children->count();
        }
        $hasChildren = ($children && $childrenCount);

        // select active children
        $activeChildren = array();
        foreach ($children as $child) {
            if ($child->getIsActive()) {
                $activeChildren[] = $child;
            }
        }
        $activeChildrenCount = count($activeChildren);
        $hasActiveChildren = ($activeChildrenCount > 0);
        $menutypes = $catdetail->getData('dgtmenu_cat_groups');
        if($catdetail->getData('dgtmenu_is_alignment') == 'justify'){
            $subwidth = '100%';
        }else{
            $subwidth = $catdetail->getData('dgtmenu_is_width').'px';
        }

        // Check if show category block if no sub-category
        $showblock = false;
        $showblock = $hasActiveChildren;
        if (Mage::helper('dgtyaris')->getCfg('menu/show_if_no_children')) {$showblock = true; }
        // prepare list item html classes
        $classes = array();
        $classes[] = 'level' . $level;
        if($level==1){
            $classes[] = 'groups item';
        }
        $classes[] = 'nav-' . $this->_getItemPosition($level);
        if ($this->isCategoryActive($category)) {
            $classes[] = 'active';
        }
        $linkClass = '';
        if ($isOutermost && $outermostItemClass) {
            $classes[] = $outermostItemClass;
            $linkClass = ' class="'.$outermostItemClass.'"';
        }
        if ($isFirst) {
            $classes[] = 'first';
        }
        if($menutypes == 'drop_group'){
        	$classes[] = 'dgt-dropdown';
        }
        if($menutypes == 'group'){
            $classes[] = 'groups-wrap';
        }
        if ($isLast) {
            $classes[] = 'last';
        }
        if ($hasActiveChildren && $level > 1) {
            $classes[] = 'mega_align_'.$catdetail->getData('dgtmenu_is_alignment');
            $classes[] = 'parent';
        }
        if ($hasActiveChildren && $level==0 && $showblock) {
            $classes[] = 'mega_align_'.$catdetail->getData('dgtmenu_is_alignment');
            $classes[] = 'parent';
        }

        // prepare list item attributes
        $attributes = array();
        if (count($classes) > 0) {
            $attributes['class'] = implode(' ', $classes);
        }
        if ($hasActiveChildren && !$noEventAttributes) {
            $attributes['onmouseover'] = 'toggleMenu(this,1)';
            $attributes['onmouseout'] = 'toggleMenu(this,0)';
        }

        // assemble list item with attributes

        $htmlLi = '<li';
        foreach ($attributes as $attrName => $attrValue) {
            $htmlLi .= ' ' . $attrName . '="' . str_replace('"', '\"', $attrValue) . '"';
        }
        $htmlLi .= '>';
        $html[] = $htmlLi;
        if ($level == 1 && $showblock){
            if($this->_getCatBlock($catdetail, 'dgtmenu_cat_block_top')){
                $html[] = '<div class="dgtmenu-block dgtmenu-block-level1-top std">';
                $html[] = $this->_getCatBlock($catdetail, 'dgtmenu_cat_block_top');
                $html[] = '</div>';
            }
        }
        $html[] = '<a href="'.$this->getCategoryUrl($category).'"'.$linkClass.'>';
        $labelCategory = $this->_getCategoryLabelHtml($catdetail, $level);
        $iconCategory = $this->_getCategoryIconHtml($catdetail, $level);
        $imageCategory = $this->_getCategoryImageHtml($catdetail, $level);
        if($level==1){
            $html[] = '<span class="title_group">' . $this->escapeHtml($category->getName()) .$labelCategory. '</span>';
        }else{
            $html[] = '<span>' . $imageCategory . $iconCategory . $this->escapeHtml($category->getName()) .$labelCategory. '</span>';
        }
        $html[] = '</a>';

        if ($level == 0) {
            $cat_block_right = $this->_getCatBlock($catdetail, 'dgtmenu_cat_block_right');
            $cat_block_left = $this->_getCatBlock($catdetail, 'dgtmenu_cat_block_left');
            if ($catdetail->getData('dgtmenu_proportions_right') || $catdetail->getData('dgtmenu_proportions_left')) {
                $columns = $catdetail->getData('dgtmenu_cat_columns');
                $proportion_right = $catdetail->getData('dgtmenu_proportions_right');
                $proportion_left = $catdetail->getData('dgtmenu_proportions_left');
            } else {
                if($catdetail->getData('dgtmenu_cat_columns')==''){
                    $columns = 4;
                }else{
                    $columns = $catdetail->getData('dgtmenu_cat_columns');
                }
                $proportion_right = 1;
                $proportion_left = 1;
            }
            $goups = $proportion_right + $proportion_left;
            if (empty($cat_block_right) || empty($cat_block_left) || $menutypes == 'drop_group'){
                if(empty($cat_block_right)){
                    $gridCount1 = 'grid12-'.(12 - $proportion_left);
                    $gridCountLeft = 'grid12-' . ($proportion_left);
                }
                if(empty($cat_block_left)){
                    $gridCount1 = 'grid12-'.(12 - $proportion_right);
                    $gridCountRight = 'grid12-' . ($proportion_right);
                }
                if(empty($cat_block_right) && empty($cat_block_left)){
                    $gridCount1 = 'grid12-12';
                }
            } elseif (!$hasActiveChildren){
                $gridCountRight = 'grid12-'.$proportion_right;
                $gridCountLeft = 'grid12-'.$proportion_left;
            } else {
                $grid = 12 - $goups;
                $gridCount1 = 'grid12-' . ($grid);
                $gridCountRight = 'grid12-' . ($proportion_right);
                $gridCountLeft = 'grid12-' . ($proportion_left);
            }
            $goups = $proportion_right + $proportion_left;
        }

        // render children
        $li = '';
        $j = 0;
        $i = 0;
        foreach ($activeChildren as $child) {
            $li .= $this->_renderCategoryMenuGroupItemHtml(
                $child,
                ($level + 1),
                ($j == $activeChildrenCount - 1),
                ($j == 0),
                false,
                $outermostItemClass,
                $childrenWrapClass,
                $noEventAttributes
            );
            $j++;
        }

        if ($childrenWrapClass && $showblock) {
            if($menutypes == 'drop_group'){
                if($level==1){
                    $html[] = '<div class="dgt-groups">';
                }else{
                    $html[] = '<div class="level'.$level.' dropdown ' . $childrenWrapClass . ' shown-sub" data-width="'.$catdetail->getData('dgtmenu_is_width').'" style="display:none; width: '.$subwidth.';height:auto;">';
                }

            }else{
                if($level==1){
                    $html[] = '<div class="dgt-groups">';
                }else{
                    $html[] = '<div class="level'.$level.' ' . $childrenWrapClass . ' shown-sub" data-width="'.$catdetail->getData('dgtmenu_is_width').'" style="display:none; width: '.$subwidth.'; height:auto;">';
                }
            }
        }
        if($level==0 && $showblock){
            if($this->_getCatBlock($catdetail, 'dgtmenu_cat_block_top')){
                $html[] = '<div class="dgtmenu-block dgtmenu-block-top grid-full std">';
                $html[] = $this->_getCatBlock($catdetail, 'dgtmenu_cat_block_top');
                $html[] = '</div>';
            }
            if($menutypes != 'drop_group'){
                if($this->_getCatBlock($catdetail, 'dgtmenu_cat_block_left') && $proportion_left){
                    $html[] = '<div class="menu-static-blocks dgtmenu-block dgtmenu-block-left '.$gridCountLeft.'">';
                    $html[] = $this->_getCatBlock($catdetail, 'dgtmenu_cat_block_left');
                    $html[] = '</div>';
                }
            }
        }
        if (!empty($li) && $hasActiveChildren) {
            if($level==0){
                $colCenter = 'gridmode gridmode-'. $columns .'col';
                $html[] = '<div class="dgtmenu-block dgtmenu-block-center menu-items '.$gridCount1.' '. $colCenter .'">';
            }
                    $html[] = '<ul class="level' . $level . '">';
                    $html[] = $li;
                    $html[] = '</ul>';
            if($level==0){
                $html[] = '</div>';
            }
        }

        if($level==0 && $showblock){
            if($menutypes != 'drop_group'){
                if($this->_getCatBlock($catdetail, 'dgtmenu_cat_block_right') && $proportion_right){
                    $html[] = '<div class="menu-static-blocks dgtmenu-block dgtmenu-block-right '.$gridCountRight.'">';
                    $html[] = $this->_getCatBlock($catdetail, 'dgtmenu_cat_block_right');
                    $html[] = '</div>';
                }
            }
            if($this->_getCatBlock($catdetail, 'dgtmenu_cat_block_bottom')){
                $html[] = '<div class="dgtmenu-block dgtmenu-block-bottom grid-full std">';
                $html[] = $this->_getCatBlock($catdetail, 'dgtmenu_cat_block_bottom');
                $html[] = '</div>';
            }
        }
        if ($childrenWrapClass && $showblock) {
            $html[] = '</div>';
        }

        if ($level == 1 && $showblock){
            if($this->_getCatBlock($catdetail, 'dgtmenu_cat_block_bottom')){
                $html[] = '<div class="dgtmenu-block dgtmenu-block-level1-top std">';
                $html[] = $this->_getCatBlock($catdetail, 'dgtmenu_cat_block_bottom');
                $html[] = '</div>';
            }
        }
        $html[] = '</li>';

        $html = implode("\n", $html);
        return $html;

    }

    protected function _renderCategoryMenuItemHtml($category, $level = 0, $isLast = false, $isFirst = false,
                                                   $isOutermost = false, $outermostItemClass = '', $childrenWrapClass = '', $noEventAttributes = false)
    {
        if (!$category->getIsActive()) {
            return '';
        }
        $catdetail = $this->_getCatInfo($category->getId());
        if($catdetail->getData('dgtmenu_is_category')==0 && $this->_isSmart == FALSE && $level==0){
            return '';
        }
        $html = array();

        // get all children
        if (Mage::helper('catalog/category_flat')->isEnabled()) {
            $children = (array)$category->getChildrenNodes();
            $childrenCount = count($children);
        } else {
            $children = $category->getChildren();
            $childrenCount = $children->count();
        }
        $hasChildren = ($children && $childrenCount);

        // select active children
        $activeChildren = array();
        foreach ($children as $child) {
            if ($child->getIsActive()) {
                $activeChildren[] = $child;
            }
        }
        $activeChildrenCount = count($activeChildren);
        $hasActiveChildren = ($activeChildrenCount > 0);
        $menutypes = $catdetail->getData('dgtmenu_cat_groups');
        if($catdetail->getData('dgtmenu_is_alignment') == 'justify'){
            $subwidth = '100%';
        }else{
            $subwidth = $catdetail->getData('dgtmenu_is_width').'px';
        }
        // Check if show category block if no sub-category
        $showblock = false;
        $showblock = $hasActiveChildren;
        if (Mage::helper('dgtyaris')->getCfg('menu/show_if_no_children')) {$showblock = true; }
        // prepare list item html classes
        $classes = array();
        $classes[] = 'level' . $level;
        if($level==1){
            $classes[] = 'item';
        }
        $classes[] = 'nav-' . $this->_getItemPosition($level);
        if ($this->isCategoryActive($category)) {
            $classes[] = 'active';
        }
        $linkClass = '';
        if ($isOutermost && $outermostItemClass) {
            $classes[] = $outermostItemClass;
            $linkClass = ' class="'.$outermostItemClass.'"';
        }
        if ($isFirst) {
            $classes[] = 'first';
        }
        if($menutypes == 'dropdown'){
            $classes[] = 'dgt-dropdown';
        }
        if ($isLast) {
            $classes[] = 'last';
        }
        if ($hasActiveChildren && $level > 1) {
            $classes[] = 'mega_align_'.$catdetail->getData('dgtmenu_is_alignment');
            $classes[] = 'parent';
        }
        if ($hasActiveChildren && $level==0 && $showblock && $this->_isMomenu == FALSE) {
            $classes[] = 'mega_align_'.$catdetail->getData('dgtmenu_is_alignment');
            $classes[] = 'parent';
        }

        // prepare list item attributes
        $attributes = array();
        if (count($classes) > 0) {
            $attributes['class'] = implode(' ', $classes);
        }
        if ($hasActiveChildren && !$noEventAttributes) {
            $attributes['onmouseover'] = 'toggleMenu(this,1)';
            $attributes['onmouseout'] = 'toggleMenu(this,0)';
        }

        // assemble list item with attributes
        $htmlLi = '<li';
        foreach ($attributes as $attrName => $attrValue) {
            $htmlLi .= ' ' . $attrName . '="' . str_replace('"', '\"', $attrValue) . '"';
        }
        $htmlLi .= '>';
        $html[] = $htmlLi;
        if ($level == 1 && $showblock && $this->_isMomenu == FALSE){
            if($this->_getCatBlock($catdetail, 'dgtmenu_cat_block_top')){
                $html[] = '<div class="dgtmenu-block dgtmenu-block-level1-top std">';
                $html[] = $this->_getCatBlock($catdetail, 'dgtmenu_cat_block_top');
                $html[] = '</div>';
            }
        }
        $labelCategory = $this->_getCategoryLabelHtml($catdetail, $level);
        $iconCategory  = $this->_getCategoryIconHtml($catdetail, $level);
        $imageCategory = $this->_getCategoryImageHtml($catdetail, $level);
        $html[] = '<a href="'.$this->getCategoryUrl($category).'"'.$linkClass.'>';
        $html[] = '<span>' . $imageCategory . $iconCategory . $this->escapeHtml($category->getName()) . $labelCategory. '</span>';
        $html[] = '</a>';

        if ($level == 0 && $this->_isMomenu == FALSE) {
            $cat_block_right = $this->_getCatBlock($catdetail, 'dgtmenu_cat_block_right');
            $cat_block_left = $this->_getCatBlock($catdetail, 'dgtmenu_cat_block_left');
            if ($catdetail->getData('dgtmenu_proportions_right') || $catdetail->getData('dgtmenu_proportions_left')) {
                $columns = $catdetail->getData('dgtmenu_cat_columns');
                $proportion_right = $catdetail->getData('dgtmenu_proportions_right');
                $proportion_left = $catdetail->getData('dgtmenu_proportions_left');
            } else {
                if($catdetail->getData('dgtmenu_cat_columns')==''){
                    $columns = 4;
                }else{
                    $columns = $catdetail->getData('dgtmenu_cat_columns');
                }
                $proportion_right = 1;
                $proportion_left = 1;
            }
            $goups = $proportion_right + $proportion_left;
            if (empty($cat_block_right) || empty($cat_block_left) || $menutypes == 'drop_group'){
                if(empty($cat_block_right)){
                    $gridCount1 = 'grid12-'.(12 - $proportion_left);
                    $gridCountLeft = 'grid12-' . ($proportion_left);
                }
                if(empty($cat_block_left)){
                    $gridCount1 = 'grid12-'.(12 - $proportion_right);
                    $gridCountRight = 'grid12-' . ($proportion_right);
                }
                if(empty($cat_block_right) && empty($cat_block_left)){
                    $gridCount1 = 'grid12-12';
                }
            } elseif (!$hasActiveChildren){
                $gridCountRight = 'grid12-'.$proportion_right;
                $gridCountLeft = 'grid12-'.$proportion_left;
            } else {
                $grid = 12 - $goups;
                $gridCount1 = 'grid12-' . ($grid);
                $gridCountRight = 'grid12-' . ($proportion_right);
                $gridCountLeft = 'grid12-' . ($proportion_left);
            }
            $goups = $proportion_right + $proportion_left;
        }

        // render children
        $li = '';
        $j = 0;
        $i = 0;
        foreach ($activeChildren as $child) {
            $li .= $this->_renderCategoryMenuItemHtml(
                $child,
                ($level + 1),
                ($j == $activeChildrenCount - 1),
                ($j == 0),
                false,
                $outermostItemClass,
                $childrenWrapClass,
                $noEventAttributes
            );
            $j++;
        }


        if ($childrenWrapClass && $showblock && $this->_isMomenu == FALSE) {
            if($menutypes == 'dropdown'){
                $html[] = '<div class="dropdown ' . $childrenWrapClass . ' shown-sub"  data-width="'.$catdetail->getData('dgtmenu_is_width').'"  style="display:none; width: '.$subwidth.'; height:auto;">';
            }else{
                $html[] = '<div class="' . $childrenWrapClass . ' shown-sub"  data-width="'.$catdetail->getData('dgtmenu_is_width').'"  style="display:none; width: '.$subwidth.'; height:auto;">';
            }
        }

        if($level==0 && $showblock && $this->_isMomenu == FALSE){
            if($this->_getCatBlock($catdetail, 'dgtmenu_cat_block_top')){
                $html[] = '<div class="dgtmenu-block dgtmenu-block-top grid-full std">';
                $html[] = $this->_getCatBlock($catdetail, 'dgtmenu_cat_block_top');
                $html[] = '</div>';
            }
            if($menutypes != 'dropdown'){
                if($this->_getCatBlock($catdetail, 'dgtmenu_cat_block_left') && $proportion_left){
                    $html[] = '<div class="menu-static-blocks dgtmenu-block dgtmenu-block-left '.$gridCountLeft.'">';
                    $html[] = $this->_getCatBlock($catdetail, 'dgtmenu_cat_block_left');
                    $html[] = '</div>';
                }
            }
        }
        if (!empty($li) && $hasActiveChildren) {
            if($level == 0 && $this->_isMomenu == FALSE){
                $colCenter = 'gridmode gridmode-'. $columns .'col';
                $html[] = '<div class="dgtmenu-block dgtmenu-block-center menu-items '.$gridCount1.' '. $colCenter .'">';
            }
                $html[] = '<ul class="level' . $level . '">';
                $html[] = $li;
                $html[] = '</ul>';
            if($level==0 && $this->_isMomenu == FALSE){
                $html[] = '</div>';
            }
        }
        if($level==0 && $showblock && $this->_isMomenu == FALSE){
            if($menutypes != 'dropdown'){
                if($this->_getCatBlock($catdetail, 'dgtmenu_cat_block_right') && $proportion_right){
                    $html[] = '<div class="menu-static-blocks dgtmenu-block dgtmenu-block-right '.$gridCountRight.'">';
                    $html[] = $this->_getCatBlock($catdetail, 'dgtmenu_cat_block_right');
                    $html[] = '</div>';
                }
            }
            if($this->_getCatBlock($catdetail, 'dgtmenu_cat_block_bottom')){
                $html[] = '<div class="dgtmenu-block dgtmenu-block-bottom grid-full std">';
                $html[] = $this->_getCatBlock($catdetail, 'dgtmenu_cat_block_bottom');
                $html[] = '</div>';
            }
        }

        if ($childrenWrapClass && $showblock && $this->_isMomenu == FALSE) {
            $html[] = '</div>';
        }

        if ($level == 1 && $showblock && $this->_isMomenu == FALSE){
            if($this->_getCatBlock($catdetail, 'dgtmenu_cat_block_bottom') && $menutypes != 'dropdown'){
                $html[] = '<div class="dgtmenu-block dgtmenu-block-level1-top std">';
                $html[] = $this->_getCatBlock($catdetail, 'dgtmenu_cat_block_bottom');
                $html[] = '</div>';
            }
        }
        $html[] = '</li>';

        $html = implode("\n", $html);
        return $html;

    }

    public function renderCategoriesMenuHtml($momenu = FALSE, $smart = TRUE, $level = 0, $outermostItemClass = '', $childrenWrapClass = '')
    {
        $this->_isMomenu = $momenu;
        $this->_isSmart = $smart;
        $activeCategories = array();
        foreach ($this->getStoreCategories() as $child) {
            if ($child->getIsActive()) {
                $activeCategories[] = $child;
            }
        }
        $activeCategoriesCount = count($activeCategories);
        $hasActiveCategoriesCount = ($activeCategoriesCount > 0);

        if (!$hasActiveCategoriesCount) {
            return '';
        }

        $html = '';
        $j = 0;
        foreach ($activeCategories as $category) {
            if($this->_isMomenu){
                $html .= $this->_renderCategoryMenuItemHtml(
                    $category,
                    $level,
                    ($j == $activeCategoriesCount - 1),
                    ($j == 0),
                    true,
                    $outermostItemClass,
                    $childrenWrapClass,
                    true
                );
            }else{
                $catdetail = Mage::getModel('catalog/category')->load($category->getId());
                $menutype = $catdetail->getData('dgtmenu_cat_groups');

                switch ($menutype) {
                    case 'group':
                    case 'drop_group':
                        $html .= $this->_renderCategoryMenuGroupItemHtml(
                            $category,
                            $level,
                            ($j == $activeCategoriesCount - 1),
                            ($j == 0),
                            true,
                            $outermostItemClass,
                            $childrenWrapClass,
                            true
                        );
                        break;
                    case 'classic':
                    case 'dropdown':
                        $html .= $this->_renderCategoryMenuItemHtml(
                            $category,
                            $level,
                            ($j == $activeCategoriesCount - 1),
                            ($j == 0),
                            true,
                            $outermostItemClass,
                            $childrenWrapClass,
                            true
                        );
                        break;
                    default:
                        $html .= $this->_renderCategoryMenuGroupItemHtml(
                            $category,
                            $level,
                            ($j == $activeCategoriesCount - 1),
                            ($j == 0),
                            true,
                            $outermostItemClass,
                            $childrenWrapClass,
                            true
                        );
                        break;
                }
            }
            $j++;
        }

        return $html;
    }

    // Get Category Block
    protected function _getCatBlock($category, $block){
        if (!$this->_tplProcessor){
            $this->_tplProcessor = Mage::helper('cms')->getBlockTemplateProcessor();
        }
        return $this->_tplProcessor->filter( trim($category->getData($block)) );
    }

    // Get Category Label
    protected function _getCategoryLabelHtml($category, $level){
        $labelCategory = $category->getData('dgtmenu_cat_label');
        if ($labelCategory){
            $getLabel = trim(Mage::helper('dgtyaris')->getCfg('menu/' . $labelCategory));
            if ($getLabel) {
                if ($level == 0){
                    return ' <span class="cat-label cat-label-'. $labelCategory .' pin-bottom">' . $getLabel . '</span>';
                }else{
                    return ' <span class="cat-label cat-label-'. $labelCategory .'">' . $getLabel . '</span>';
                }
            }
        }return '';
    }
    // Get Category info
    protected function _getCatInfo($categoryId)
    {
        return Mage::getModel('catalog/category')->load($categoryId);
    }

    // Get Category Icon
    protected function _getCategoryIconHtml($category, $level){
        $category_icon=$category->getData('dgtmenu_category_icon');
        if($category_icon)
        {
            return ' <i class="cat-icon fa ' .$category_icon. '"></i>';
        }

    }

    // Get Category Image
    protected function _getCategoryImageHtml($category, $level){
        $category_image = $category->getData('dgtmenu_category_image');
        if($category_image){
            $urlImage = Mage::getBaseUrl('media') . 'catalog/category/'. $category_image;
            return '<small class="dgt-image-cat" style="background: url('. $urlImage .')"></small>';
        }
    }

}