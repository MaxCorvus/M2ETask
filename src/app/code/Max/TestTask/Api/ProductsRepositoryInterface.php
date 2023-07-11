<?php
namespace Max\TestTask\Api;

use Max\TestTask\Api\Data\ProductsInterface;

interface ProductsRepositoryInterface {

    public function getById($id);
    public function save(ProductsInterface $product);

}

