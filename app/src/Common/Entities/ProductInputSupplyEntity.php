<?php

namespace App\src\Common\Entities;


class ProductInputSupplyEntity
{
    /**
     * @var $name
     */
    public $name;

    /**
     * @var $amount
     */
    public $amount;

    /**
     * @var $measure
     */
    public $measure;

    /**
     * @var $quantity
     */
    public $quantity;

    /**
     * @var $supplie_id
     */
    public $supplie_id;

    /**
     * @var $quantity_discount
     */
    public $quantity_discount;

    /**
     * ProductInputSupplyEntity constructor.
     * @param $name
     * @param $price
     * @param $amount
     * @param $measure
     * @param $provaider_id
     */
    public function __construct($name, $amount, $measure, $quantity, $supplie_id, $quantity_discount)
    {
        $this->name              = $name;
        $this->amount            = $amount;
        $this->measure           = $measure;
        $this->quantity          = $quantity;
        $this->supplie_id        = $supplie_id;
        $this->quantity_discount = $quantity_discount;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return double
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getMeasure()
    {
        return $this->measure;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return int
     */
    public function getSupplieId()
    {
        return $this->supplie_id;
    }

    /**
     * @return double
     */
    public function getQuantitydiscount()
    {
        return $this->quantity_discount;
    }

}