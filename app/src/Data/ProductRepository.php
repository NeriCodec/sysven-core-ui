<?php

namespace App\src\Data;


use App\Product;
use App\src\Common\Entities\ProductCreateEntity;
use App\src\Common\Entities\ProductEntity;
use App\src\Common\Interfaces\IProductRepository;
use App\src\Service\ProductCreateUseCase;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class ProductRepository implements IProductRepository
{

    public function registerProduct(ProductEntity $productEntity, $inputs)
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

        if ($success) {
            try {
                $productCreateRepository = new ProductCreateUseCase(new ProductCreateRepository());
                foreach ($inputs as $input) {
                    $productCreate = new ProductCreateEntity(
                        $product->id,
                        $input['product_input'],
                        $input['quantity']
                    );

                    $success = $productCreateRepository->registerProductCreate($productCreate);
                }
            } catch (QueryException $error) {
                $success = false;
                $this->deleteProduct($product->id);
                //throw new Exception(':: [Error al guardar el producto] :: ' . $error->getMessage());
            }
        }

        return $success;
    }

    public function updateProduct(ProductEntity $productEntity, $id)
    {
        $product        = Product::find($id);
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

    public function getProductById($id)
    {
        try {
            $product = Product::find($id);
        } catch (QueryException $error) {
            $product = [];
            //throw new Exception(':: [Error al eliminar el producto] :: ' . $error->getMessage());
        }

        return $product;
    }

    public function getAllProductInputs($product_id)
    {
        try {
            $product = new Product;
            $product->productInputs()->where('products_id', '=', $product_id)->get();
        } catch (QueryException $error) {
            $product = [];
            //throw new Exception(':: [Error al eliminar el producto] :: ' . $error->getMessage());
        }

        return $product;
    }


    public function getAllProducts()
    {
//        SELECT DISTINCT
//  products.id,
//  products.name,
//  products.price,
//  COUNT(product_inputs_use.quantity) as num_product_inputs
//FROM ((product_inputs_use
//  INNER JOIN products ON products.id = product_inputs_use.products_id));
        try {
            $products = DB::table('product_inputs_use')
                          ->distinct()
                          ->select(DB::raw('COUNT(product_inputs_use.quantity) as num_product_inputs, products.id, products.name, products.price'))
                          ->join('products', 'products.id', '=', 'product_inputs_use.products_id')
                          ->get();
        } catch (QueryException $error) {
            //$products = [];
            throw new Exception(':: [Error al obtener los productos] :: ' . $error->getMessage());
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }

        return $products;
    }


}