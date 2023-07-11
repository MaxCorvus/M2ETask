<?php

namespace Max\TestTask\Controller\Adminhtml\Index;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Message\ManagerInterface;
use Max\TestTask\Model\ProductsRepository;

class Save implements HttpPostActionInterface
{
    protected $result;
    protected $productsRepository;
    protected $request;
    protected $messageManager;

    public function __construct(
        ResultFactory    $result,
        ProductsRepository  $productsRepository,
        RequestInterface $request,
        ManagerInterface $messageManager
    )
    {
        $this->result = $result;
        $this->productsRepository = $productsRepository;
        $this->request = $request;
        $this->messageManager = $messageManager;
    }

    public function execute()
    {
        try {

            $data = $this->request->getPostValue();
            if (!empty($data['id'])) {
                $product = $this->productsRepository->getById($data['id']);
                $product->addData($data);
                $this->productsRepository->save($product);
            }
            $this->messageManager->addSuccessMessage(__("Success"));
        }
        catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e, __("Save error"));
        }

        $result = $this->result->create(ResultFactory::TYPE_REDIRECT)->setPath('products/index/listing');
        return $result;
    }
}
