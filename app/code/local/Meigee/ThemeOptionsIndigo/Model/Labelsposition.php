<?php
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meaigeeteam.com <nick@meaigeeteam.com>
 * @copyright Copyright (C) 2010 - 2012 Meigeeteam
 *
 */
class Meigee_ThemeOptionsIndigo_Model_labelsposition
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'top-left', 'label'=>Mage::helper('ThemeOptionsIndigo')->__('Top, Left')),
            array('value'=>'bottom-left', 'label'=>Mage::helper('ThemeOptionsIndigo')->__('Bottom, Left')),
			array('value'=>'top-right', 'label'=>Mage::helper('ThemeOptionsIndigo')->__('Top, Right')),
            array('value'=>'bottom-right', 'label'=>Mage::helper('ThemeOptionsIndigo')->__('Bottom, Right'))
        );
    }

}