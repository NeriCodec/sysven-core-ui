<?php

namespace App\src\Common\Interfaces;


use App\src\Common\Entities\SupplyEntity;

interface ISupplyRepository
{
    public function create(SupplyEntity $supplyEntity);

    public function update(SupplyEntity $supplyEntity, $id);

    public function delete($id);

    public function getAll();
}