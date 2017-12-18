<?php

namespace App\src\Common\Interfaces;


use App\src\Common\Entities\ProductInputSupplyEntity;

interface IProductInputSupplyRepository
{
    public function getAll();

    public function create(ProductInputSupplyEntity $productInputSupplieEntity);

    public function update(ProductInputSupplyEntity $productInputSupplieEntity);

    public function delete($id);

    public function getInputProductByName($name_input);

    public function updateQuantityOfInputProductById($id, $quantity);
}