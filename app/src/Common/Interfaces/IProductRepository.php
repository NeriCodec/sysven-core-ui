<?php

namespace App\src\Common\Interfaces;


use App\src\Common\Entities\ProductEntity;

interface IProductRepository
{
    public function registerProduct(ProductEntity $productEntity);

    public function updateProduct(ProductEntity $productEntity, $id);

    public function deleteProduct($id);

    public function getAllProducts();
}