<?php

namespace App\src\Common\Entities;


class ProductShoppingCartEntity
{
    /**
     * @var $name
     */
    public $name;

    /**
     * @var $price
     */
    public $price;

    /**
     * @var $quantity
     */
    public $quantity;

    /**
     * @var $slug
     */
    public $slug;

    /**
     * ProductEntity constructor.
     * @param $name
     * @param $price
     * @param $quantity
     * @param $slug
     */
    public function __construct($slug, $name, $price, $quantity)
    {
        $this->slug     = $slug;
        $this->name     = $name;
        $this->price    = $price;
        $this->quantity = $quantity;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
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
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }
}