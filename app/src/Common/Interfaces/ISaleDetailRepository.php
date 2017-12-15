<?php

namespace App\src\Common\Interfaces;


use App\src\Common\Entities\SaleDetailEntity;

interface ISaleDetailRepository
{
    public function getAll();

    public function add(SaleDetailEntity $saleDetailEntity);

    public function delete($saleId);

    public function getProductOfSaleDetailById($saleDetailId);

    public function incrementQuantityOfProductOfSaleDetail($saleId);

    public function removeQuantityOfProductOfSaleDetail($saleId);

    public function getIdOfSaleDetailByProductId($productId);

    public function getSaleDetailsById($saleId);
}