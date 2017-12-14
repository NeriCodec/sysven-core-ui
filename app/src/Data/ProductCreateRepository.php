<?php

namespace App\src\Data;

use App\ProductCreate;
use App\src\Common\Entities\ProductCreateEntity;
use App\src\Common\Interfaces\IProductCreateRepository;
use Illuminate\Database\QueryException;

class ProductCreateRepository
    implements IProductCreateRepository
{
    public function create(ProductCreateEntity $productCreateEntity)
    {
        $productCreate = new ProductCreate;

        $productCreate->products_id   = $productCreateEntity->getProductsId();
        $productCreate->quantity      = $productCreateEntity->getQuantity();
        $productCreate->product_input = $productCreateEntity->getProductInput();

        return $productCreate->save();
    }

    public function getAllInputsOfProduct($product_id)
    {
        try {
            $productsInput = ProductCreate::all()->where('products_id', '=', $product_id);
        } catch (QueryException $error) {
            $productsInput = [];
        }

        return $productsInput;
    }

    public function getAll()
    {
        $productsCreated = ProductCreate::all();

        return $productsCreated;
    }

    public function update(ProductCreateEntity $productCreateEntity)
    {
        // TODO: Revisar este metodo
    }

    public function delete($id)
    {
        try {
            $productsInput = ProductCreate::all()->where('products_id', '=', $id);
            foreach ($productsInput as $productInput) {
                $success = $productInput->delete();
            }

        } catch (QueryException $error) {
            return false;
        }

        return $success;
    }


}