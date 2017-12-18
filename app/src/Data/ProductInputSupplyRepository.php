<?php

namespace App\src\Data;


use App\ProductInputSupplie;
use App\src\Common\Entities\ProductInputSupplyEntity;
use App\src\Common\Interfaces\IProductInputSupplyRepository;
use Exception;
use Illuminate\Database\QueryException;


class ProductInputSupplyRepository
    implements IProductInputSupplyRepository
{

    public function create(ProductInputSupplyEntity $productInputSupplieEntity)
    {
        try {
            $productInputSupplie = new ProductInputSupplie;

            $productInputSupplie->name              = $productInputSupplieEntity->getName();
            $productInputSupplie->amount            = $productInputSupplieEntity->getAmount();
            $productInputSupplie->measure           = $productInputSupplieEntity->getMeasure();
            $productInputSupplie->quantity          = $productInputSupplieEntity->getQuantity();
            $productInputSupplie->supplies_id       = $productInputSupplieEntity->getSupplieId();
            $productInputSupplie->quantity_discount = $productInputSupplieEntity->getQuantitydiscount();

            $success = $productInputSupplie->save();
        } catch (QueryException $error) {
            $success = false;
            //throw new Exception(':: [Error al obtener los productos] :: ' . $error->getMessage());
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }


        return $success;
    }

    public function getAll()
    {
        try {
            $productsInputSupplie = ProductInputSupplie::all();
        } catch (QueryException $error) {
            $productsInputSupplie = [];
            //throw new Exception(':: [Error al obtener los productos] :: ' . $error->getMessage());
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }

        return $productsInputSupplie;
    }

    public function update(ProductInputSupplyEntity $productInputSupplieEntity)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function getInputProductByName($name_input)
    {
        try {
            $product = ProductInputSupplie::all()->where('name', '=', $name_input)->last();
        } catch (QueryException $error) {
            $product = [];
            //throw new Exception(':: [Error al eliminar el producto] :: ' . $error->getMessage());
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }

        return $product;
    }

    public function updateQuantityOfInputProductById($id, $quantity)
    {
        try {
            $productInputSupplie           = ProductInputSupplie::find($id);
            $productInputSupplie->quantity = $quantity;

            $success = $productInputSupplie->save();

            //dd($success);
        } catch (QueryException $error) {
            $success = false;
            //throw new Exception(':: [Error al obtener los productos] :: ' . $error->getMessage());
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }


        return $success;
    }
}