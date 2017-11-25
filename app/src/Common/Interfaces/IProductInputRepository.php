<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 23/11/2017
 * Time: 08:23 PM
 */

namespace App\src\Common\Interfaces;


use App\src\Common\Entities\ProductInputEntity;

interface IProductInputRepository
{
    public function registerProductInput(ProductInputEntity $productInputEntity);
}