<?php

namespace App\src\Common\Interfaces;

use App\src\Common\Entities\ProductEntity;

interface IProductRepository
{
    public function create(ProductEntity $productEntity);

    public function getAll();

    public function update(ProductEntity $productEntity);

    public function delete($id);

    public function getProductById($id);

    public function getProductByName($productName);

    public function search($productName);
}