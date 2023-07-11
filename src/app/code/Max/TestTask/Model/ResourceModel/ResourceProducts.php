<?php

namespace Max\TestTask\Model\ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;

class ResourceProducts extends AbstractDb
{
    private const TABLE_NAME = "products";
    private const PRIMARY_KEY = "id";
    public function __construct(Context $context)
    {
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init(self::TABLE_NAME, self::PRIMARY_KEY);
    }
}
