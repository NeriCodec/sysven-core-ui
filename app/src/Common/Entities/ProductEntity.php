<?php
/**
 * Created by PhpStorm.
 * User: Dux-044
 * Date: 23/11/2017
 * Time: 02:39 PM
 */

namespace App\src\Common\Entities;


class ProductEntity
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
     * ProductEntity constructor.
     * @param $name
     * @param $price
     */
    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
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

}