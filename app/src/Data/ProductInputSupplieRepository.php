<?php

namespace App\src\Data;


use App\ProductInputSupplie;
use App\src\Common\Entities\ProductInputSupplieEntity;
use App\src\Common\Interfaces\IProductInputSupplieRepository;

class ProductInputSupplieRepository implements IProductInputSupplieRepository
{

    public function registerProductInputSupplie(ProductInputSupplieEntity $productInputSupplieEntity)
    {
        $productInputSupplie = new ProductInputSupplie;

        $productInputSupplie->name        = $productInputSupplieEntity->getName();
        $productInputSupplie->price       = $productInputSupplieEntity->getPrice();
        $productInputSupplie->amount      = $productInputSupplieEntity->getAmount();
        $productInputSupplie->measure     = $productInputSupplieEntity->getMeasure();
        $productInputSupplie->supplies_id = $productInputSupplieEntity->getSupplieId();

        return $productInputSupplie->save();
    }
}