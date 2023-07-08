<?php
class Adroll_Pixel_Block_Adminhtml_StoreSelector extends Mage_Adminhtml_Block_Template
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('adroll/pixel/store_selector.phtml');
    }
}
