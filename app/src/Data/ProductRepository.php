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

class ProductRepository
    implements IProductRepository
{

    public function create(ProductEntity $productEntity)
    {
        try {
            $product  = new Product;
            $response = $this->registerProductWithInputs($product, $productEntity);
        } catch (QueryException $error) {
            $response = [];
            //throw new Exception(':: [Error al obtener los productos] :: ' . $error->getMessage());
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }


        return $response;
    }

    public function update(ProductEntity $productEntity)
    {
        $product = Product::find($productEntity->getId());

        return $this->registerProductWithInputs($product, $productEntity);
    }

    public function delete($id)
    {
        $productCreateRepository = new ProductCreateUseCase(new ProductCreateRepository());

        $success = $productCreateRepository->delete($id);

        if ($success) {
            $product = Product::find($id);
            try {
                $success = $product->delete();
            } catch (QueryException $error) {
                $success = false;
                //throw new Exception(':: [Error al eliminar el producto] :: ' . $error->getMessage());
            }
        }

        return $success;
    }

    public function getAll()
    {
        try {
            $products = Product::all();
        } catch (QueryException $error) {
            $products = [];
            //throw new Exception(':: [Error al obtener los productos] :: ' . $error->getMessage());
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }

        return $products;
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

    public function getProductByName($productName)
    {
        $productEntity = [];
        try {
            $product          = Product::all()->where('name', '=', $productName)->last();
            if($product == null)
            {
                return $productEntity;
            }

            $productSerialize = $product->jsonSerialize();


            $productEntity = new ProductEntity(
                $productSerialize["id"],
                $productSerialize["name"],
                $productSerialize["price"],
                null
            );


        } catch (QueryException $error) {
            $productEntity = [];
            //throw new Exception(':: [Error al eliminar el producto] :: ' . $error->getMessage());
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }

        return $productEntity;
    }


    private function registerProductWithInputs($product, $productEntity)
    {
        $product->name  = $productEntity->getName();
        $product->price = $productEntity->getPrice();

        try {
            $success = $product->save();
        } catch (QueryException $error) {
            $success = false;
            //throw new Exception(':: [Error al guardar el producto] :: ' . $error->getMessage());
        }

        if ($productEntity->inputs == null) {
            return $success;
        }

        if ($success) {
            try {
                $productCreateRepository = new ProductCreateUseCase(new ProductCreateRepository());
                foreach ($productEntity->inputs as $input) {
                    $productCreate = new ProductCreateEntity(
                        $product->id,
                        $input['product_input'],
                        $input['quantity']
                    );

                    $success = $productCreateRepository->create($productCreate);
                }
            } catch (QueryException $error) {
                $success = false;
                //$this->delete($product->id);
                //throw new Exception(':: [Error al guardar el producto] :: ' . $error->getMessage());
            }
        }

        return $success;
    }

    public function search($productName)
    {
        try {
            $products = DB::table('products')
                          ->where('name', 'like', '%' . $productName . '%')
                          ->get();

        } catch (QueryException $error) {
            $products = [];
            //throw new Exception(':: [Error al obtener los productos] :: ' . $error->getMessage());
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }

        return $products;
    }


}