<?php
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meaigeeteam.com <nick@meaigeeteam.com>
 * @copyright Copyright (C) 2010 - 2012 Meigeeteam
 *
 */
class Meigee_ThemeOptionsIndigo_Model_labelsorder
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'new_sale', 'label'=>Mage::helper('ThemeOptionsIndigo')->__('New, On sale')),
            array('value'=>'sale_new', 'label'=>Mage::helper('ThemeOptionsIndigo')->__('On sale, New'))
        );
    }

}