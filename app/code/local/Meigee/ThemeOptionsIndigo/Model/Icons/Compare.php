<?php
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meaigeeteam.com <nick@meaigeeteam.com>
 * @copyright Copyright (C) 2010 - 2012 Meigeeteam
 *
 */
class Meigee_ThemeOptionsIndigo_Model_Icons_Compare
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'fa-signal', 'label'=>Mage::helper('ThemeOptionsIndigo')->__('fa-signal')),
            array('value'=>'fa-exchange', 'label'=>Mage::helper('ThemeOptionsIndigo')->__('fa-exchange')),
            array('value'=>'fa-arrows-alt', 'label'=>Mage::helper('ThemeOptionsIndigo')->__('fa-arrows-alt')),
            array('value'=>'fa-bar-chart-o', 'label'=>Mage::helper('ThemeOptionsIndigo')->__('fa-bar-chart-o')),
            array('value'=>'fa-random', 'label'=>Mage::helper('ThemeOptionsIndigo')->__('fa-random')),
			array('value'=>'fa-align-left', 'label'=>Mage::helper('ThemeOptionsIndigo')->__('fa-align-left'))
        );
    }

}