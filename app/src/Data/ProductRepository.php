<?php
/**
 * Created by PhpStorm.
 * User: Dux-044
 * Date: 23/11/2017
 * Time: 02:43 PM
 */

namespace App\src\Data;


use App\Product;
use App\src\Common\Entities\ProductEntity;
use App\src\Common\Interfaces\IProductRepository;

class ProductRepository implements IProductRepository
{

    public function registerProduct(ProductEntity $productEntity)
    {
        $product = new Product;

        $product->name = $productEntity->getName();
        $product->price = $productEntity->getPrice();

        return $product->save();
    }

    public function updateProduct(ProductEntity $productEntity, $id)
    {
        // TODO: Implement updateProduct() method.
    }

    public function deleteProduct($id)
    {
        // TODO: Implement deleteProduct() method.
    }
}