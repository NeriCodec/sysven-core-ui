<?php

namespace App\src\Common\Entities;


class SaleDetailEntity
{
    /**
     * @var $id
     */
    private $id;

    /**
     * @var $sales_id
     */
    private $sales_id;

    /**
     * @var $products_id
     */
    private $products_id;

    /**
     * Cantidad de productos
     * @var $quantity
     */
    private $quantity;

    /** Subtotal
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
    public function __construct($id, $sales_id, $products_id, $quantity, $subtotal)
    {
        $this->id          = $id;
        $this->sales_id    = $sales_id;
        $this->products_id = $products_id;
        $this->quantity    = $quantity;
        $this->subtotal    = $subtotal;
    }

    /**
     * @param mixed $sales_id
     */
    public function setSalesId($sales_id)
    {
        $this->sales_id = $sales_id;
    }

    /**
     * @param mixed $products_id
     */
    public function setProductsId($products_id)
    {
        $this->products_id = $products_id;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @param mixed $subtotal
     */
    public function setSubtotal($subtotal)
    {
        $this->subtotal = $subtotal;
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