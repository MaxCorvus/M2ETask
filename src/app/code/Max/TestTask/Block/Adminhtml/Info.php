<?php

namespace Max\TestTask\Block\Adminhtml;

use Magento\Backend\Block\Template;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Max\TestTask\Helper\Data;

class Info extends Template
{
    protected $helper;

    public function __construct(
        Template\Context $context,
        ScopeConfigInterface $scopeConfig,
        Data $helper,
        array $data = []
    ) {
        $this->helper = $helper;
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context, $data);
    }

    public function getName()
    {
        return $this->helper->getName();
    }

    public function getEmail()
    {
        return $this->helper->getEmail();
    }

    public function getPhone()
    {
        return $this->helper->getPhone();
    }
}
