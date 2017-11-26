<?php

namespace App\src\Data;

use App\ProductInput;
use App\src\Common\Entities\ProductInputEntity;
use App\src\Common\Interfaces\IProductInputRepository;

class ProductInputRepository implements IProductInputRepository
{

    public function registerProductInput(ProductInputEntity $productInputEntity)
    {
        $productInput = new ProductInput;

        $productInput->name    = $productInputEntity->getName();
        $productInput->measure = $productInputEntity->getMeasure();

        return $productInput->save();
    }
}