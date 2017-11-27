<?php

namespace App\src\Common\Interfaces;


use App\src\Common\Entities\ProductInputEntity;

interface IProductInputRepository
{
    public function registerProductInput(ProductInputEntity $productInputEntity);

    public function updateProductInput(ProductInputEntity $productInputEntity, $id);

    public function deleteProductInput($id);

    public function getAllProductInputs();
}