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
class DGTThemes_DGTTheme_Model_System_Config_Source_Design_Font_Family_Google
{ 
    public function toOptionArray()
    {
        $listGoogleFont = file_get_contents('https://www.googleapis.com/webfonts/v1/webfonts?key=AIzaSyAVT6Xd4qTswxLkmYTb6e_gH7iDpbxTx5M');
        if($listGoogleFont){
            $gfont = json_decode($listGoogleFont);
            $fontarray = $gfont->items;
            $options = array();
            $options[] = array(
                'value' => '',
                'label' => '--Select--',
            );
            foreach($fontarray as $font){
                $options[] = array(
                    'value' => $font->family,
                    'label' => $font->family,
                );
            }
            return $options;
        }
        return null;
    }
}
