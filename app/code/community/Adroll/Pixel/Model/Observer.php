<?php
class Adroll_Pixel_Model_Observer
{
    public function logCartAdd()
    {
        $product = Mage::getModel('catalog/product')->load(Mage::app()->getRequest()->getParam('product', 0));

        if (!$product->getId()) {
            return;
        }

        $categories = $product->getCategoryIds();

        Mage::getModel('core/session')->setProductToShoppingCart(
            new Varien_Object(array(
                'id' => $product->getId(),
                'qty' => Mage::app()->getRequest()->getParam('qty', 1),
                'name' => $product->getName(),
                'price' => $product->getPrice(),
                'category_name' => Mage::getModel('catalog/category')->load($categories[0])->getName(),
            ))
        );
    }

    private function notifyShopifypyConfigChange()
    {
        Mage::helper('adroll_pixel/config')->notifyShopifypyConfigChange(Mage::app()->getStore()->getGroupId());
    }

    public function storeGroupDeleteAfter()
    {
        $this->notifyShopifypyConfigChange();
    }

    public function storeSaveAfter($event)
    {
        $this->notifyShopifypyConfigChange();
    }

    public function storeDeleteAfter($event)
    {
        $this->notifyShopifypyConfigChange();
    }

    public function configSave($observer)
    {
        $section = $observer->getEvent()->getSection();
        if ($section == 'general' || $section == 'currency') {
            // The admin section 'general' is where the locale is changed. The 'currency' section is where currencies
            // get assigned/unassigned to/from a store view.
            $this->notifyShopifypyConfigChange();
        }
    }
}
