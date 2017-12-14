<?php

namespace App\src\Common\Interfaces;


use App\src\Common\Entities\ProductInputSupplyEntity;

interface IProductInputSupplyRepository
{
    public function create(ProductInputSupplyEntity $productInputSupplieEntity);

    public function getAll();

    public function update(ProductInputSupplyEntity $productInputSupplieEntity);

    public function delete($id);
}