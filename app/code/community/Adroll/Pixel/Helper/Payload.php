<?php
/**
 * Helper for generating payload data for track events
 */
class Adroll_Pixel_Helper_Payload extends Mage_Core_Helper_Abstract
{
    /**
     * @param $product
     * @return array Basic product information (product_id, price, and category)
     */
    private function serializeProduct($product)
    {
        $store = Mage::app()->getStore();
        $productInfo = array();

        $productInfo['product_id'] = $product->getId();

        // Product price is always stored in base currency, so we must convert it
        $baseCurrencyCode = $store->getBaseCurrencyCode();
        $currentCurrencyCode = $store->getCurrentCurrencyCode();
        $productInfo['product_group'] = $store->getCode() . '_' . strtolower($currentCurrencyCode);
        $productInfo['price'] = (string)Mage::helper('directory')->currencyConvert($product->getFinalPrice(), $baseCurrencyCode, $currentCurrencyCode);

        $productCategoryIds = $product->getCategoryIds();
        $productCategoryId = array_pop($productCategoryIds);
        $productCategory = Mage::getModel('catalog/category')->setStoreId($store->getId())->load($productCategoryId);
        if ($productCategory) {
            $productInfo['category'] = $productCategory->getName();
        }

        return $productInfo;
    }

    /**
     * @return array Basic product information of all products currently in the cart
     */
    private function getProductsInCart()
    {
        $products = array();
        $cartItems = Mage::getSingleton('checkout/cart')->getQuote()->getAllVisibleItems();
        foreach ($cartItems as $item) {
            $productId = $item->getProductId();
            $product = Mage::getModel('catalog/product')->load($productId);
            $productInfo = $this->serializeProduct($product);
            $productInfo['quantity'] = $item->getQty();
            $products[] = $productInfo;
        }
        return $products;
    }

    public function getProductViewPayload()
    {
        $product = Mage::registry('current_product');
        $payload = array('products' => array());
        $payload['products'][] = $this->serializeProduct($product);
        return $payload;
    }

    public function getCartViewPayload()
    {
        return array('products' => $this->getProductsInCart());
    }

    public function getAddToCartPayload()
    {
        $newlyAddedProduct = Mage::getModel('core/session')->getProductToShoppingCart();
        if ($newlyAddedProduct && $newlyAddedProduct->getId()) {
            $newlyAddedProduct = Mage::getModel('catalog/product')->load($newlyAddedProduct->getId());
            $productInfo = $this->serializeProduct($newlyAddedProduct);

            $cartItems = Mage::getSingleton('checkout/cart')->getQuote()->getAllVisibleItems();
            foreach ($cartItems as $item) {
                if ($item->getProductId() == $productInfo['product_id']) {
                    $productInfo['quantity'] = $item->getQty();
                };
            }

            $payload = array('products' => array());
            $payload['products'][] = $productInfo;
            return $payload;
        } else {
            return null;
        }
    }

    public function getCheckoutStartPayload()
    {
        return array('products' => $this->getProductsInCart());
    }

    public function getPurchasePayload()
    {
        $payload = array('products' => array());
        $order = Mage::getSingleton('sales/order')->loadByIncrementId(Mage::getSingleton('checkout/session')->getLastRealOrderId());
        $orderItems = $order->getAllItems();
        foreach ($orderItems as $item) {
            $productInfo = $this->serializeProduct($item->getProduct());
            $productInfo['quantity'] = $item->getQtyOrdered();
            $payload['products'][] = $productInfo;
        }
        // Order total is stored in the current currency, no need to convert
        $payload['conversion_value'] = $order->getGrandTotal();
        $payload['order_id'] = $order->getIncrementId();
        return $payload;
    }

    public function getSimpleSearchPayload()
    {
        $term = Mage::helper('catalogsearch')->getQueryText();
        $payload = array('product_id' => array(), 'keywords' => $term);

        $productCollection = Mage::getModel('catalogsearch/layer')->getProductCollection();
        $counter = 0;
        $limit = 15;
        foreach ($productCollection as $product) {
            if ($counter < $limit) {
                $payload['product_id'][] = $product->getId();
                $counter += 1;
            } else {
                break;
            }
        }
        return $payload;
    }
}
