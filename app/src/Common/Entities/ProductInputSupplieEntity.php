<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 23/11/2017
 * Time: 08:33 PM
 */

namespace App\src\Common\Entities;


class ProductInputSupplieEntity
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
     * @var $amount
     */
    public $amount;

    /**
     * @var $measure
     */
    public $measure;

    /**
     * @var $supplie_id
     */
    public $supplie_id;

    /**
     * ProductInputSupplieEntity constructor.
     * @param $name
     * @param $price
     * @param $amount
     * @param $measure
     * @param $provaider_id
     */
    public function __construct($name, $price, $amount, $measure, $supplie_id)
    {
        $this->name = $name;
        $this->price = $price;
        $this->amount = $amount;
        $this->measure = $measure;
        $this->supplie_id = $supplie_id;
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
    public function getSupplieId()
    {
        return $this->supplie_id;
    }

}