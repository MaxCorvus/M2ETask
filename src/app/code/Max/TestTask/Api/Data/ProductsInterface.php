<?php
namespace Max\TestTask\Api\Data;

interface ProductsInterface {
    const ID      = 'id';
    const NAME    = 'name';
    const SKU     = 'sku';
    const PRICE   = 'price';
    const QTY     = 'qty';
    const STATUS  = 'status';

    public function getId();
    public function getName();
    public function getSku();
    public function getPrice();
    public function getQty();
    public function getStatus();
    public function setId($id);
    public function setName($name);
    public function setSku($sku);
    public function setPrice($price);
    public function setQty($qty);
    public function setStatus($status);
}
