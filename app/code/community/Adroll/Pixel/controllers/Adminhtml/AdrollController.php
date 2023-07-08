<?php
class Adroll_Pixel_Adminhtml_AdrollController extends Mage_Adminhtml_Controller_Action
{
    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('system/config');
    }

    public function finalizeAction()
    {
        $r = $this->getRequest();

        $group = Mage::getModel('core/store_group')
            ->getCollection()
            ->addFieldToFilter('group_id', $r->getPost('store_group_id', -1))
            ->fetchItem();

        if ($r->isPost() && $r->getPost('advertisable') && $r->getPost('pixel') && $group !== false) {
            $configHelper = Mage::helper('adroll_pixel/config');
            $existentGroup = $configHelper->getGroupForAdvertisableEid($r->getPost('advertisable'));

            if ($existentGroup !== null && $existentGroup->getId() != $group->getId()) {
                $configHelper->uninstallPixel($existentGroup->getId());
            }

            $configHelper->setAdvertisableName($group->getId(), $r->getPost('advertisable_name'));
            $configHelper->setAdvertisableEid($group->getId(), $r->getPost('advertisable'));
            $configHelper->setPixelEid($group->getId(), $r->getPost('pixel'));
            $url = Adroll_Pixel_Main::ADROLL_BASE_URL . '/ecommerce/magento/finalize?' . http_build_query(array(
                'advertisable' => $r->getPost('advertisable'),
                'store_group_id' => $group->getId()
            ));
        } else {
            $url = Mage::helper("adminhtml")->getUrl('adminhtml/dashboard');
        }

        $this->getResponse()->setRedirect($url);
    }

    public function uninstallPixelAction()
    {
        if ($this->getRequest()->getPost('store_group_id') === null) {
            $this->getResponse()->setHttpResponseCode(400);
        } else {
            Mage::helper('adroll_pixel/config')->uninstallPixel($this->getRequest()->getPost('store_group_id'));
            $this->getResponse()->setHttpResponseCode(204);
        }
    }

    public function authenticateAction()
    {
        $this->loadLayout();

        // Attempted to complete via layout updates XML configuration
        $this->getLayout()->addBlock('Adroll_Pixel_Block_StoreSelector', 'content');
        $this->getLayout()->getBlock('root')->setChild('content', 'content');

        $this->renderLayout();
    }
}
