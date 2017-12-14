<?php

namespace App\src\Common\Entities;

class ProductCreateEntity
{
    /**
     * @var $products_id
     */
    private $products_id;

    /**
     * @var $product_input
     */
    private $product_input;

    /**
     * @var $quantity
     */
    private $quantity;

    /**
     * ProductCreateEntity constructor.
     * @param $products_id
     * @param $producto_input
     * @param $quantity
     */
    public function __construct($products_id, $producto_input, $quantity)
    {
        $this->products_id   = $products_id;
        $this->product_input = $producto_input;
        $this->quantity      = $quantity;
    }

    /**
     * @return int
     */
    public function getProductsId()
    {
        return $this->products_id;
    }

    /**
     * @return string
     */
    public function getProductInput()
    {
        return $this->product_input;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }
}