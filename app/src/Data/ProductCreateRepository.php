<?php

namespace App\src\Data;

use App\ProductCreate;
use App\src\Common\Entities\ProductCreateEntity;
use App\src\Common\Interfaces\IProductCreateRepository;

class ProductCreateRepository implements IProductCreateRepository
{
    public function registerProductCreate(ProductCreateEntity $productCreateEntity)
    {
        $productCreate = new ProductCreate;

        $productCreate->products_id   = $productCreateEntity->getProductsId();
        $productCreate->quantity      = $productCreateEntity->getQuantity();
        $productCreate->product_input = $productCreateEntity->getProductoInput();

        return $productCreate->save();
    }
}