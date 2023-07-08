<?php
class Adroll_Pixel_Helper_Config extends Mage_Core_Helper_Abstract
{
    const ADVERTISABLE_NAME_CONFIG_TEMPLATE = 'websites/store_groups/id_%s/adroll_advertisable_name';
    const ADVERTISABLE_CONFIG_TEMPLATE = 'websites/store_groups/id_%s/adroll_advertisable';
    const PIXEL_CONFIG_TEMPLATE = 'websites/store_groups/id_%s/adroll_pixel';

    private function getConfigValue($path, $default = null)
    {
        $data = Mage::getConfig()->getNode($path, 'default');
        if (!$data) {
            return $default;
        }
        return (string)$data;
    }

    private function setConfigValue($path, $value)
    {
        Mage::getConfig()->saveConfig($path, $value)->saveCache();
    }

    public function getGroupForAdvertisableEid($advertisableEid)
    {
        foreach (Mage::app()->getWebsites() as $website) {
            foreach ($website->getGroups() as $group) {
                if ($this->getAdvertisableEid($group->getId()) === $advertisableEid) {
                    return $group;
                }
            }
        }

        return null;
    }

    public function getAdvertisableName($groupId)
    {
        return self::getConfigValue(sprintf(self::ADVERTISABLE_NAME_CONFIG_TEMPLATE, $groupId));
    }

    public function setAdvertisableName($groupId, $advertisableName)
    {
        self::setConfigValue(sprintf(self::ADVERTISABLE_NAME_CONFIG_TEMPLATE, $groupId), $advertisableName);
    }

    public function getAdvertisableEid($groupId)
    {
        return self::getConfigValue(sprintf(self::ADVERTISABLE_CONFIG_TEMPLATE, $groupId));
    }

    public function setAdvertisableEid($groupId, $advertisableEid)
    {
        self::setConfigValue(sprintf(self::ADVERTISABLE_CONFIG_TEMPLATE, $groupId), $advertisableEid);
    }

    public function getPixelEid($groupId)
    {
        return self::getConfigValue(sprintf(self::PIXEL_CONFIG_TEMPLATE, $groupId));
    }

    public function setPixelEid($groupId, $pixelEid)
    {
        self::setConfigValue(sprintf(self::PIXEL_CONFIG_TEMPLATE, $groupId), $pixelEid);
    }

    public function uninstallPixel($groupId)
    {
        $oldAdvertisableEid = $this->getAdvertisableEid($groupId);
        Mage::getConfig()
            ->deleteConfig(sprintf(self::ADVERTISABLE_NAME_CONFIG_TEMPLATE, $groupId))
            ->deleteConfig(sprintf(self::ADVERTISABLE_CONFIG_TEMPLATE, $groupId))
            ->deleteConfig(sprintf(self::PIXEL_CONFIG_TEMPLATE, $groupId))
            ->saveCache();
        $this->notifyShopifypyConfigChange($groupId, $oldAdvertisableEid);
    }

    public function notifyShopifypyConfigChange($groupId, $advertisableEid = null)
    {
        if ($advertisableEid === null) {
            $advertisableEid = $this->getAdvertisableEid($groupId);
        }
        $url = Adroll_Pixel_Main::ADROLL_BASE_URL . '/ecommerce/magento/api/v1/notify_config_change?advertisable=' . $advertisableEid;
        try {
            file_get_contents($url);
        } catch (Exception $e) {
            Mage::log('Adroll_Pixel: Store config change notification failed');
        }
    }
}
