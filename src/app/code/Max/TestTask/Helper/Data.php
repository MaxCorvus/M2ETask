<?php

namespace Max\TestTask\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{
    const XML_PATH_NAME = 'products/info/name';
    const XML_PATH_EMAIL = 'products/info/email';
    const XML_PATH_PHONE = 'products/info/phone';


    public function isEnable() {
        return !(
            empty($this->scopeConfig->getValue(self::XML_PATH_NAME))
            || empty($this->scopeConfig->getValue(self::XML_PATH_EMAIL))
            || empty($this->scopeConfig->getValue(self::XML_PATH_PHONE))
        );
    }

    public function getName()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_NAME);
    }

    public function getEmail()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_EMAIL);
    }

    public function getPhone()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_PHONE);
    }
}
