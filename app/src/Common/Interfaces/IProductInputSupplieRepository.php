<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 23/11/2017
 * Time: 08:35 PM
 */

namespace App\src\Common\Interfaces;


use App\src\Common\Entities\ProductInputSupplieEntity;

interface IProductInputSupplieRepository
{
    public function registerProductInputSupplie(ProductInputSupplieEntity $productInputSupplieEntity);
}