<?php
class Adroll_Pixel_Helper_Feed extends Mage_Core_Helper_Abstract
{
    const FEED_PAGE_SIZE = 100;
    private $baseCurrencyCode;

    public function __construct()
    {
        $this->baseCurrencyCode = Mage::app()->getStore()->getBaseCurrencyCode();
    }

    private function convertCurrency($value, $currencyCode)
    {
        return Mage::helper('directory')->currencyConvert($value, $this->baseCurrencyCode, $currencyCode);
    }

    private function getBrand($product)
    {
        $brandAttribute = $product->getResource()->getAttribute('manufacturer');
        if ($brandAttribute) {
            return $brandAttribute->getFrontend()->getValue($product);
        }
        return null;
    }

    private function getPriceInfo($product, $currencyCode)
    {
        switch ($product->getTypeId()){
            case 'bundle':
                $price = Mage::getModel('bundle/product_price')->getTotalPrices($product, 'min', 1);
                $salePrice = $price;
                break;
            case 'grouped':
                $prices = array();
                $salePrices = array();
                $associatedProducts = $product->getTypeInstance(true)->getAssociatedProducts($product);
                foreach($associatedProducts as $associatedProduct) {
                    $prices[] = $associatedProduct->getPrice();
                    $salePrices[] = $associatedProduct->getFinalPrice();
                }
                sort($prices);
                sort($salePrices);
                $price = $prices[0];
                $salePrice = $salePrices[0];
                break;
            default:
                $price = $product->getPrice();
                $salePrice = $product->getFinalPrice();
                break;
        }

        return array(
            'price' => $this->convertCurrency($price, $currencyCode),
            'sale_price' => $this->convertCurrency($salePrice, $currencyCode)
        );
    }
    private function serializeProduct($productId, $currencyCode, $storeId)
    {
        $product = Mage::getModel('catalog/product')->setStoreId($storeId)->load($productId);

        $generalInfo = array(
            'id' => $productId,
            'title' => $product->getName(),
            'description' => $product->getData('description'),
            'url' => $product->getProductUrl(),
            'brand' => $this->getBrand($product),
            'image_url' => $product->getImageUrl()
        );

        $priceInfo = $this->getPriceInfo($product, $currencyCode);

        return array_merge($generalInfo, $priceInfo);
    }

    public function getFeedableProducts($store)
    {
        $productCollection = Mage::getResourceModel('catalog/product_collection')
            // Exclude disabled products
            ->addAttributeToFilter('status', array('eq' => Mage_Catalog_Model_Product_Status::STATUS_ENABLED))
            // Exclude products that are not visible individually
            ->addAttributeToFilter('visibility', array('neq' => Mage_Catalog_Model_Product_Visibility::VISIBILITY_NOT_VISIBLE))
            // Exclude products not available in this store
            ->addStoreFilter($store);

        // Exclude out-of-stock products
        Mage::getSingleton('cataloginventory/stock')->addInStockFilterToCollection($productCollection);
        $productCollection->getSelect()->distinct(true);
        return $productCollection;
    }

    public function generateProductFeed($currencyCode, $storeCode, $page)
    {
        $productFeed = array('products' => array());
        $store = Mage::getModel('core/store')->load($storeCode, 'code'); //->getId();

        $productCollection = $this->getFeedableProducts($store);

        // Only add products to feed result if the requested page exists. We have to do this manually because the
        // setCurPage function still returns results when you go past the last page.
        $lastPage = ceil($productCollection->getSize() / self::FEED_PAGE_SIZE);
        if ($page <= $lastPage) {
            $productCollection->setPageSize(self::FEED_PAGE_SIZE)->setCurPage($page);
            foreach ($productCollection as $product) {
                $productFeed['products'][] = $this->serializeProduct($product->getId(), $currencyCode, $store->getId());
            }
        }

        return $productFeed;
    }
}
