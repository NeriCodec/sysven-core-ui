<?php

namespace App\src\Common\Interfaces;


use App\src\Common\Entities\ProductEntity;

interface IProductRepository
{
    public function registerProduct(ProductEntity $productEntity, $inputs);

    public function updateProduct(ProductEntity $productEntity, $id);

    public function deleteProduct($id);

    public function getProductById($id);

    public function getAllProductInputs($product_id);

    public function getAllProducts();
}