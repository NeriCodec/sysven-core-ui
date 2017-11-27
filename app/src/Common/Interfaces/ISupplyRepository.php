<?php

namespace App\src\Common\Interfaces;


use App\src\Common\Entities\SupplyEntity;

interface ISupplyRepository
{
    public function registerSupply(SupplyEntity $supplyEntity);

    public function updateSupply(SupplyEntity $supplyEntity, $id);

    public function deleteSupply($id);

    public function getAllSupplies();
}