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

        $saleDetail->sales_id    = $saleDetailEntity->getSalesId();
        $saleDetail->products_id = $saleDetailEntity->getProductsId();
        $saleDetail->quantity    = $saleDetailEntity->getQuantity();
        $saleDetail->subtotal    = $saleDetailEntity->getSubtotal();

        return $saleDetail->save();
    }

    public function getSaleDetailsById($id)
    {
        $saleDetail = new SaleDetail;
        $products   = $saleDetail->product()->find($id);
        $sales      = $saleDetail->sale()->find($id);

        return $sales;
    }
}