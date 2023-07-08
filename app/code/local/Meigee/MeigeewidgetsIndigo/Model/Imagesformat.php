<?php class Meigee_MeigeewidgetsIndigo_Model_Imagesformat
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'.png', 'label'=>Mage::helper('meigeewidgetsindigo')->__('.png')),
            array('value'=>'.jpg', 'label'=>Mage::helper('meigeewidgetsindigo')->__('.jpg')),
            array('value'=>'.gif', 'label'=>Mage::helper('meigeewidgetsindigo')->__('.gif'))
        );
    }

}