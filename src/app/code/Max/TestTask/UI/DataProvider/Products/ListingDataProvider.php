<?php

namespace Max\TestTask\Ui\DataProvider\Products;

use Magento\Ui\DataProvider\AbstractDataProvider;
use Max\TestTask\Model\ResourceModel\Products\CollectionFactory;

class ListingDataProvider extends AbstractDataProvider
{
    private CollectionFactory $collectionFactory;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    )
    {
        $this->collectionFactory = $collectionFactory;
        $this->collection = $collectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if (!$this->getCollection()->isLoaded()) {
            $this->getCollection()->load();
        }
        $products = $this->getCollection()->toArray();

        return $products;
    }
}
