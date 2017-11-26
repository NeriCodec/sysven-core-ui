<?php

namespace App\src\Common\Interfaces;


use App\src\Common\Entities\ProductCreateEntity;

interface IProductCreateRepository
{
    public function registerProductCreate(ProductCreateEntity $productCreateEntity);
}