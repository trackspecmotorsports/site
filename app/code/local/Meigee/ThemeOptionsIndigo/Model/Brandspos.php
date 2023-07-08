<?php 
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meaigeeteam.com <nick@meaigeeteam.com>
 * @copyright Copyright (C) 2010 - 2012 Meigeeteam
 *
 */
class Meigee_ThemeOptionsIndigo_Model_Brandspos
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'center', 'label'=>Mage::helper('ThemeOptionsIndigo')->__('Product Details Col')),
			array('value'=>'sidebar', 'label'=>Mage::helper('ThemeOptionsIndigo')->__('Sidebar'))
        );
    }

}