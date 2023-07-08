<?php
class Adroll_Pixel_Block_Pixel extends Mage_Core_Block_Template
{
    public function getAdvertisableEid()
    {
        $groupId = Mage::app()->getStore()->getGroupId();
        return Mage::helper('adroll_pixel/config')->getAdvertisableEid($groupId);
    }

    public function getPixelEid()
    {
        $groupId = Mage::app()->getStore()->getGroupId();
        return Mage::helper('adroll_pixel/config')->getPixelEid($groupId);
    }

    public function isConfigured()
    {
        return $this->getAdvertisableEid() !== null && $this->getPixelEid() !== null;
    }

    private function makeEvent($name, $payload = null)
    {
        return array('name' => $name, 'payload' => $payload);
    }

    private function makePageViewEvent($segmentName = null, $extraPayload = null)
    {
        $event = $this->makeEvent('pageView');
        $payload = array();
        if ($segmentName) {
            $payload['segment_name'] = $segmentName;
        }
        if ($extraPayload) {
            $payload = array_merge($payload, $extraPayload);
        }
        if (!empty($payload)) {
            $event['payload'] = $payload;
        }
        return $event;
    }

    public function getCustomerEmail()
    {
        $action = Mage::app()->getFrontController()->getAction()->getFullActionName();
        switch ($action) {
            case 'checkout_onepage_success':
                return $order = Mage::getSingleton('sales/order')
                    ->loadByIncrementId(Mage::getSingleton('checkout/session')->getLastRealOrderId())
                    ->getCustomerEmail();
            default:
                return Mage::getSingleton('customer/session')->getCustomer()->getEmail();
        }
    }

    public function getGlobalVars()
    {
        $globalVars = array();
        $globalVars['adroll_adv_id'] = $this->getAdvertisableEid();
        $globalVars['adroll_pix_id'] = $this->getPixelEid();
        $globalVars['adroll_version'] = '2.0';
        return $globalVars;
    }

    public function getPixelProperties()
    {
        $store = Mage::app()->getStore();
        return array(
            'currency' => $store->getCurrentCurrencyCode(),
            'language' => Mage::getStoreConfig(Mage_Core_Model_Locale::XML_PATH_DEFAULT_LOCALE, $store->getId())
        );
    }

    public function getEvents()
    {
        $events = array();
        $payloadHelper = Mage::helper('adroll_pixel/payload');
        $action = Mage::app()->getFrontController()->getAction()->getFullActionName();

        switch ($action) {
            case 'catalog_product_view':
                $events[] = $this->makePageViewEvent('magento_viewed_product');
                $events[] = $this->makeEvent('productView', $payloadHelper->getProductViewPayload());
                break;
            case 'checkout_cart_index':
                $events[] = $this->makePageViewEvent('magento_viewed_cart');
                $events[] = $this->makeEvent('cartView', $payloadHelper->getCartViewPayload());
                $addToCartPayload = $payloadHelper->getAddToCartPayload();
                if ($addToCartPayload) {
                    $events[] = $this->makePageViewEvent('magento_added_product_to_cart');
                    $events[] = $this->makeEvent('addToCart', $addToCartPayload);
                    Mage::getModel('core/session')->unsProductToShoppingCart();
                }
                break;
            case 'onestepcheckout_index_index':
            case 'iwd_opc_index_index':
                # If the store has a onestep checkout plugin, fire viewed_checkout and order_review segments together.
                # Currently supported onestep-checkout extensions:
                # https://marketplace.magento.com/onestepcheckout-idev-onestepcheckout.html
                # https://www.iwdagency.com/extensions/checkout-suite-m1.html
                $events[] = $this->makePageViewEvent('magento_order_reviewed');
                $events[] = $this->makePageViewEvent('magento_viewed_checkout');
                $events[] = $this->makeEvent('checkoutStart', $payloadHelper->getCheckoutStartPayload());
                break;
            case 'checkout_onepage_index':
                $events[] = $this->makePageViewEvent('magento_viewed_checkout');
                $events[] = $this->makeEvent('checkoutStart', $payloadHelper->getCheckoutStartPayload());
                break;
            case 'checkout_onepage_success':
                $purchasePayload = $payloadHelper->getPurchasePayload();
                $events[] = $this->makePageViewEvent('magento_order_received', $purchasePayload);
                $events[] = $this->makeEvent('purchase', $purchasePayload);
                break;
            case 'cms_index_index':
                $events[] = $this->makePageViewEvent();
                $events[] = $this->makeEvent('homeView');
                break;
            case 'catalogsearch_result_index':
                $events[] = $this->makePageViewEvent();
                $events[] = $this->makeEvent('search', $payloadHelper->getSimpleSearchPayload());
                break;
            default:
                $events[] = $this->makePageViewEvent();
                break;
        }
        return $events;
    }
}
