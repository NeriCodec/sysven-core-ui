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
     * @var $id
     */
    public $id;

    /**
     * @var $name
     */
    public $name;

    /**
     * @var $price
     */
    public $price;

    /**
     * @var $inputs
     */
    public $inputs;

    /**
     * ProductEntity constructor.
     * @param $name
     * @param $price
     */
    public function __construct($id, $name, $price, $inputs)
    {
        $this->id     = $id;
        $this->name   = $name;
        $this->price  = $price;
        $this->inputs = $inputs;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
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
     * @return array
     */
    public function getInputs()
    {
        return $this->inputs;
    }


}