<?php

namespace Max\TestTask\Model;

use Magento\Framework\Model\AbstractModel;
use Max\TestTask\Api\Data\ProductsInterface;
use Max\TestTask\Model\ResourceModel\ResourceProducts;

class Products extends AbstractModel implements ProductsInterface
{
    protected function _construct()
    {
        $this->_init(ResourceProducts::class);
    }
    public function getId()
    {
        return $this->getData(self::ID);
    }

    public function getName()
    {
        return $this->getData(self::NAME);
    }

    public function getSku()
    {
        return $this->getData(self::SKU);
    }

    public function getPrice()
    {
        return $this->getData(self::PRICE);
    }

    public function getQty()
    {
        return $this->getData(self::QTY);
    }
    public function getStatus()
    {
        return $this->getData(self::STATUS);
    }
    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }

    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    public function setSku($sku)
    {
        return $this->setData(self::SKU, $sku);
    }

    public function setPrice($price)
    {
        return $this->setData(self::PRICE, $price);
    }

    public function setQty($qty)
    {
        return $this->setData(self::QTY, $qty);
    }
    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }
}
