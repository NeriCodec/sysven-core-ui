<?php

namespace App\src\Common\Entities;


class SaleDetailEntity
{
    /**
     * @var $sale_num_sale
     */
    private $sales_id;

    /**
     * @var $sale_num_sale
     */
    private $products_id;

    /**
     * Cantidad de productos
     * @var $quantity
     */
    private $quantity;

    /** Subtotal de multiplicacion de quantity * product.price
     * @var $subtotal
     */
    private $subtotal;

    /**
     * SaleDetailEntity constructor.
     * @param $sales_id
     * @param $products_id
     * @param $quantity
     * @param $subtotal
     */
    public function __construct($sales_id, $products_id, $quantity, $subtotal)
    {
        $this->sales_id    = $sales_id;
        $this->products_id = $products_id;
        $this->quantity    = $quantity;
        $this->subtotal    = $subtotal;
    }

    /**
     * @return int
     */
    public function getSalesId()
    {
        return $this->sales_id;
    }

    /**
     * @return int
     */
    public function getProductsId()
    {
        return $this->products_id;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return double
     */
    public function getSubtotal()
    {
        return $this->subtotal;
    }
}