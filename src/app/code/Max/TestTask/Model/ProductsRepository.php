<?php

namespace Max\TestTask\Model;

use Max\TestTask\Api\ProductsRepositoryInterface;
use Max\TestTask\Api\Data\ProductsInterface;
use Max\TestTask\Model\ResourceModel\ResourceProducts;
use Max\TestTask\Model\ProductsFactory;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Api\SearchCriteria\CollectionProcessor;
use Max\TestTask\Model\ResourceModel\Products\CollectionFactory;


class ProductsRepository implements ProductsRepositoryInterface
{
    private $resource;
    private $productsFactory;
    protected $collectionProcessor;
    protected $collectionFactory;

    public function __construct(
        ResourceProducts $resource,
        ProductsFactory $productsFactory,
        CollectionProcessor $collectionProcessor,
        CollectionFactory $collectionFactory,
    ) {
        $this->resource = $resource;
        $this->productsFactory = $productsFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->collectionFactory = $collectionFactory;
    }

    public function getById($id)
    {
        $product = $this->productsFactory->create();
        $this->resource->load($product, $id);
        return $product;
    }
    public function save(ProductsInterface $product)
    {
        try {
            $this->resource->save($product);
        }
        catch (\Exception $e) {
            throw new CouldNotSaveException(__($e->getMessage()));
        }

        return $product;
    }
    public function getInstance()
    {
        return $this->productsFactory->create();
    }
}
