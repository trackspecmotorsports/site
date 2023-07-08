<?php 
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meaigeeteam.com <nick@meaigeeteam.com>
 * @copyright Copyright (C) 2010 - 2012 Meigeeteam
 *
 */
class Meigee_MeigeewidgetsIndigo_Model_TickerDirection
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'next', 'label'=>Mage::helper('meigeewidgetsindigo')->__('Next')),
            array('value'=>'prev', 'label'=>Mage::helper('meigeewidgetsindigo')->__('Prev'))
        );
    }

}