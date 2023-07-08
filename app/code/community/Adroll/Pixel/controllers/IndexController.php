<?php
class Adroll_Pixel_IndexController extends Mage_Core_Controller_Front_Action
{
    const SESSION_NAMESPACE = 'adminhtml';
    protected $_sessionNamespace = self::SESSION_NAMESPACE;

    public function authenticateAction()
    {
        $query = $this->getRequest()->getQuery();
        if (!isset($query['advertisable'], $query['pixel'], $query['name'])) {
            $url = Mage::helper("adminhtml")->getUrl('adminhtml/dashboard');
        } else {
            $url = Mage::helper("adminhtml")->getUrl('adminhtml/adroll/authenticate') . '?'
                . http_build_query($query);
        }
        $this->getResponse()->setRedirect($url);
    }

    private function renderJson($result)
    {
        $this->getResponse()->setHeader('Content-type', 'application/json');
        $this->getResponse()->setBody(Mage::helper('core')->jsonEncode($result));
    }

    public function feedAction()
    {
        $feedHelper = Mage::helper('adroll_pixel/feed');
        $currencyCode = $this->getRequest()->getParam('currencyCode', 'USD');
        $storeCode = $this->getRequest()->getParam('storeCode', 'default');
        $page = $this->getRequest()->getParam('page', '1');
        $this->renderJson($feedHelper->generateProductFeed($currencyCode, $storeCode, $page));
    }

    public function storeGroupMetaAction()
    {
        $metaHelper = Mage::helper('adroll_pixel/meta');
        $storeGroupId = $this->getRequest()->getParam('storeGroupId', '0');
        $this->renderJson($metaHelper->generateStoreGroupMeta($storeGroupId));
    }
}
