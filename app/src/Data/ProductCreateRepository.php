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

        $productCreate->product_inputs_id = $productCreateEntity->getProductInputsId();
        $productCreate->products_id       = $productCreateEntity->getProducsId();

        return $productCreate->save();
    }
}