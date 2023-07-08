<?php
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meaigeeteam.com <nick@meaigeeteam.com>
 * @copyright Copyright (C) 2010 - 2012 Meigeeteam
 *
 */
class Meigee_ThemeOptionsIndigo_Model_Icons_Headercart
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'fa-shopping-cart', 'label'=>Mage::helper('ThemeOptionsIndigo')->__('fa-shopping-cart')),
            array('value'=>'fa-download', 'label'=>Mage::helper('ThemeOptionsIndigo')->__('fa-download')),
            array('value'=>'fa-truck', 'label'=>Mage::helper('ThemeOptionsIndigo')->__('fa-truck')),
            array('value'=>'fa-barcode', 'label'=>Mage::helper('ThemeOptionsIndigo')->__('fa-barcode')),
            array('value'=>'fa-archive', 'label'=>Mage::helper('ThemeOptionsIndigo')->__('fa-archive')),
            array('value'=>'fa-suitcase', 'label'=>Mage::helper('ThemeOptionsIndigo')->__('fa-suitcase'))
        );
    }

}