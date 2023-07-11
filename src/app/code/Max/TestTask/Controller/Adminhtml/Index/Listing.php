<?php

namespace Max\TestTask\Controller\Adminhtml\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\App\Action;
use Max\TestTask\Helper\Data;

class Listing extends Action implements HttpGetActionInterface
{
    protected $helper;
    public function __construct(
        Data $helper,
        \Magento\Framework\App\Action\Context $context
    )
    {
        $this->helper = $helper;
        return parent::__construct($context);
    }

    public function execute()
    {
        if (!$this->helper->isEnable()) {
        $this->getMessageManager()->addErrorMessage('Fill in the information for access');
        return $this->_redirect('adminhtml/system_config/edit/section/products/info');
    }

        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->getConfig()->getTitle()->prepend((__('Products')));
        return $resultPage;
    }

}
