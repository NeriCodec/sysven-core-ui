<?php

namespace App\src\Common\Entities;

class ProductCreateEntity
{
    /**
     * @var $product_inputs_id
     */
    public $product_inputs_id;

    /**
     * @var $producs_id
     */
    public $producs_id;

    /**
     * ProductCreateEntity constructor.
     * @param $product_inputs_id
     * @param $producs_id
     */
    public function __construct($product_inputs_id, $producs_id)
    {
        $this->product_inputs_id = $product_inputs_id;
        $this->producs_id        = $producs_id;
    }

    /**
     * @return int
     */
    public function getProductInputsId()
    {
        return $this->product_inputs_id;
    }

    /**
     * @return int
     */
    public function getProducsId()
    {
        return $this->producs_id;
    }

}