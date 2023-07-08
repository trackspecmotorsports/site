<?php 
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meaigeeteam.com <nick@meaigeeteam.com>
 * @copyright Copyright (C) 2010 - 2012 Meigeeteam
 *
 */
class Meigee_ThemeOptionsIndigo_Model_Pagelayout
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'left', 'label'=>Mage::helper('ThemeOptionsIndigo')->__('Left')),
            array('value'=>'right', 'label'=>Mage::helper('ThemeOptionsIndigo')->__('Right')),
            array('value'=>'none', 'label'=>Mage::helper('ThemeOptionsIndigo')->__('No Sidebar'))          
        );
    }

}