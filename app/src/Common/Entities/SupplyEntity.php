<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 23/11/2017
 * Time: 08:46 PM
 */

namespace App\src\Common\Entities;


class SupplyEntity
{

    /**
     * @var $name
     */
    public $name;

    /**
     * @var $address
     */
    public $address;

    /**
     * SupplyEntity constructor.
     * @param $name
     * @param $address
     */
    public function __construct($name, $address)
    {
        $this->name    = $name;
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

}