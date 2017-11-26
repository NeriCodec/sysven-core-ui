<?php

namespace App\src\Data;


use App\Product;
use App\src\Common\Entities\ProductEntity;
use App\src\Common\Interfaces\IProductRepository;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class ProductRepository implements IProductRepository
{

    public function registerProduct(ProductEntity $productEntity)
    {
        $product = new Product;

        $product->name  = $productEntity->getName();
        $product->price = $productEntity->getPrice();

        try {
            $success = $product->save();
        } catch (QueryException $error) {
            $success = false;
            //throw new Exception(':: [Error al guardar el producto] :: ' . $error->getMessage());
        }

        return $success;
    }

    public function updateProduct(ProductEntity $productEntity, $id)
    {
        $product = Product::find($id);
        $product->name  = $productEntity->getName();
        $product->price = $productEntity->getPrice();

        try {
            $success = $product->save();
        } catch (QueryException $error) {
            $success = false;
            //throw new Exception(':: [Error al actualizar el producto] :: ' . $error->getMessage());
        }

        return $success;
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);

        try {
            $success = $product->delete();
        } catch (QueryException $error) {
            $success = false;
            //throw new Exception(':: [Error al eliminar el producto] :: ' . $error->getMessage());
        }

        return $success;
    }

    public function getAllProducts()
    {
        return DB::table('products')->get();
    }


}