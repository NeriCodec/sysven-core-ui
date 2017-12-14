<?php

namespace App\src\Data;


use App\ProductInputSupplie;
use Illuminate\Support\Facades\DB;
use App\src\Common\Entities\ProductInputSupplyEntity;
use App\src\Common\Interfaces\IProductInputSupplyRepository;


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

}