<?php

namespace App\src\Common\Interfaces;


use App\src\Common\Entities\SaleDetailEntity;

interface ISaleDetailRepository
{
    public function registerSaleDatail(SaleDetailEntity $saleDetailEntity);
}