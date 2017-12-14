<?php

namespace App\src\Common\Interfaces;


use App\src\Common\Entities\SaleDetailEntity;

interface ISaleDetailRepository
{
    public function getAll();
    
    public function create(SaleDetailEntity $saleDetailEntity);

    public function update(SaleDetailEntity $saleDetailEntity, $id);

    public function getSaleDetailById($id);

    public function getSaleDetailsById($id);
}