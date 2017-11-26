<?php

namespace App\src\Data;


use App\SaleDetail;
use App\src\Common\Entities\SaleDetailEntity;
use App\src\Common\Interfaces\ISaleDetailRepository;

class SaleDetailRepository implements ISaleDetailRepository
{
    public function registerSaleDatail(SaleDetailEntity $saleDetailEntity)
    {
        $saleDetail = new SaleDetail;

        $saleDetail->sales_num_sale = $saleDetailEntity->getSaleNumSale();
        $saleDetail->products_id = $saleDetailEntity->getProductsId();

        return $saleDetail->save();
    }

}