<?php

namespace Max\TestTask\Model\ResourceModel\Products;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'id';

    protected function _construct()
    {
        $this->_init(
            'Max\TestTask\Model\Products',
            'Max\TestTask\Model\ResourceModel\ResourceProducts'
        );
    }
}
