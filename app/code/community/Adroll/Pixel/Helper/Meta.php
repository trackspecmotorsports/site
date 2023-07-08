<?php
class Adroll_Pixel_Helper_Meta extends Mage_Core_Helper_Abstract
{
    public function serializeStore($store)
    {
        return array(
            'id' => $store->getId(),
            'name' => $store->getName(),
            'code' => $store->getCode(),
            'currencies' => $this->getCurrenciesForStore($store->getId()),
            'locale' => $this->getLocaleForStore($store->getId()),
            'product_count' => Mage::helper('adroll_pixel/feed')->getFeedableProducts($store)->getSize()
        );
    }

    public function getCurrenciesForStore($storeId)
    {
        $rows = Mage::getModel('core/config_data')
            ->getCollection()
            ->addFieldToFilter('path', 'currency/options/allow')
            ->addFieldToFilter('scope_id', $storeId)
            ->getData();

        $baseCurrencyCode = Mage::app()->getStore($storeId)->getBaseCurrencyCode();
        if (count($rows) > 0) {
            $baseCurrency = Mage::getModel('directory/currency')->load($baseCurrencyCode);
            $currencyCodes = explode(',', $rows[0]['value']);
            $validCurrencies = array();
            foreach ($currencyCodes as $currencyCode) {
                if ($baseCurrency->getRate($currencyCode)) {
                    $validCurrencies[] = $currencyCode;
                }
            }

            if (count($validCurrencies) === 0) {
                return array($baseCurrencyCode);
            }

            return $validCurrencies;
        } else {
            return array($baseCurrencyCode);
        }
    }

    public function getLocaleForStore($storeId)
    {
        return Mage::getStoreConfig('general/locale/code', $storeId);
    }

    public function generateStoreGroupMeta($storeGroupId)
    {
        $configHelper = Mage::helper('adroll_pixel/config');
        $storeGroupMeta = array(
            'magento_version' => Mage::getVersion(),
            'extension_version' => (string) Mage::getConfig()->getNode()->modules->Adroll_Pixel->version,
            'advertisable_eid' => $configHelper->getAdvertisableEid($storeGroupId),
            'pixel_eid' => $configHelper->getPixelEid($storeGroupId),
            'stores' => array()
        );
        $stores = Mage::getModel('core/store')->getCollection()->addFieldToFilter('group_id', $storeGroupId);
        foreach ($stores as $store) {
            $storeGroupMeta['stores'][] = $this->serializeStore($store);
        }
        return $storeGroupMeta;
    }
}
