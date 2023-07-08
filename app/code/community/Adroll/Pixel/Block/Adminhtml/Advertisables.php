<?php
class Adroll_Pixel_Block_Adminhtml_Advertisables extends Mage_Adminhtml_Block_System_Config_Form_Fieldset
{
    public function render(Varien_Data_Form_Element_Abstract $element)
    {
        $block = $this->getLayout()->createBlock('core/template');
        $block->setTemplate('adroll/pixel/advertisables.phtml');
        $block->setData('module_name', $this->getModuleName());
        $block->setData('uninstallPixelActionUrl', Mage::helper("adminhtml")->getUrl('adminhtml/adroll/uninstallPixel'));
        return $block->toHtml();
    }
}
