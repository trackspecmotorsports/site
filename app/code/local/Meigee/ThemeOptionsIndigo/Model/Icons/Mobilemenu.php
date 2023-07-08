<?php
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meaigeeteam.com <nick@meaigeeteam.com>
 * @copyright Copyright (C) 2010 - 2012 Meigeeteam
 *
 */
class Meigee_ThemeOptionsIndigo_Model_Icons_Mobilemenu
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'fa-bars', 'label'=>Mage::helper('ThemeOptionsIndigo')->__('fa-bars')),
            array('value'=>'fa-tasks', 'label'=>Mage::helper('ThemeOptionsIndigo')->__('fa-tasks')),
            array('value'=>'fa-align-center', 'label'=>Mage::helper('ThemeOptionsIndigo')->__('fa-align-center')),
            array('value'=>'fa-list-alt', 'label'=>Mage::helper('ThemeOptionsIndigo')->__('fa-list-alt')),
            array('value'=>'fa-align-left', 'label'=>Mage::helper('ThemeOptionsIndigo')->__('fa-align-left')),
            array('value'=>'fa-qrcode', 'label'=>Mage::helper('ThemeOptionsIndigo')->__('fa-qrcode'))
        );
    }

}