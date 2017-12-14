<?php

namespace App\src\Common\Interfaces;


use App\src\Common\Entities\ProductCreateEntity;

interface IProductCreateRepository
{
    public function create(ProductCreateEntity $productCreateEntity);

    public function update(ProductCreateEntity $productCreateEntity);

    public function delete($id);

    public function getAll();

    public function getAllInputsOfProduct($product_id);
}