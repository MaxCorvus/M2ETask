<?php

namespace Max\TestTask\Model;

use Magento\Ui\DataProvider\AbstractDataProvider;
use Max\TestTask\Model\ResourceModel\Products\CollectionFactory;
use Max\TestTask\Model\ProductsRepository;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Exception\NoSuchEntityException;

class DataProvider extends AbstractDataProvider
{
    protected $collection;
    protected $productsRepository;
    protected $request;
    protected $loadedData;
    protected $dataPersistor;

    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $collectionFactory
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        ProductsRepository $productsRepository,
        RequestInterface $request,
        DataPersistorInterface $dataPersistor,
        array $meta = [],
        array $data = []
    )
    {
        $this->collection = $collectionFactory->create();
        $this->productsRepository = $productsRepository;
        $this->request = $request;
        $this->dataPersistor = $dataPersistor;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {

        $id = (int) $this->request->getParam('id');
        if (!$id) {
            return [];
        }

        try {
            $product = $this->productsRepository->getById($id);
        } catch (NoSuchEntityException) {
            return [];
        }
        return [
            $id => array_merge(['id' => $id], $product->getData())
        ];

    }
}

