<?php

namespace App\src\Common\Entities;


class SaleDetailEntity
{
    /**
     * @var $sale_num_sale
    */
    private $sale_num_sale;

    /**
     * @var $sale_num_sale
     */
    private $products_id;

    /**
     * SaleDetailEntity constructor.
     * @param $sale_num_sale
     * @param $products_id
     */
    public function __construct($sale_num_sale, $products_id)
    {
        $this->sale_num_sale = $sale_num_sale;
        $this->products_id = $products_id;
    }

    /**
     * @return int
     */
    public function getSaleNumSale()
    {
        return $this->sale_num_sale;
    }

    /**
     * @return int
     */
    public function getProductsId()
    {
        return $this->products_id;
    }
}