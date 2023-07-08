<?php
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meaigeeteam.com <nick@meaigeeteam.com>
 * @copyright Copyright (C) 2010 - 2012 Meigeeteam
 *
 */
class Meigee_ThemeOptionsIndigo_Model_Icons_Editproduct
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'fa-pencil', 'label'=>Mage::helper('ThemeOptionsIndigo')->__('fa-pencil')),
            array('value'=>'fa-eraser', 'label'=>Mage::helper('ThemeOptionsIndigo')->__('fa-eraser')),
            array('value'=>'fa-undo', 'label'=>Mage::helper('ThemeOptionsIndigo')->__('fa-undo')),
            array('value'=>'fa-wrench', 'label'=>Mage::helper('ThemeOptionsIndigo')->__('fa-wrench')),
            array('value'=>'fa-cogs', 'label'=>Mage::helper('ThemeOptionsIndigo')->__('fa-cogs')),
            array('value'=>'fa-pencil-square', 'label'=>Mage::helper('ThemeOptionsIndigo')->__('fa-pencil-square'))
        );
    }

}