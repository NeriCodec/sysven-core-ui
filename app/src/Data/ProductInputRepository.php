<?php

namespace App\src\Data;

use App\ProductInput;
use App\src\Common\Entities\ProductInputEntity;
use App\src\Common\Interfaces\IProductInputRepository;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class ProductInputRepository implements IProductInputRepository
{

    public function registerProductInput(ProductInputEntity $productInputEntity)
    {
        $productInput = new ProductInput;

        $productInput->name    = $productInputEntity->getName();
        $productInput->measure = $productInputEntity->getMeasure();

        try {
            $success = $productInput->save();
        } catch (QueryException $error) {
            $success = false;
            //throw new Exception(':: [Error al guardar el producto] :: ' . $error->getMessage());
        }

        return $success;
    }

    public function updateProductInput(ProductInputEntity $productInputEntity, $id)
    {
        $productInput          = ProductInput::find($id);
        $productInput->name    = $productInputEntity->getName();
        $productInput->measure = $productInputEntity->getMeasure();

        try {
            $success = $productInput->save();
        } catch (QueryException $error) {
            $success = false;
            //throw new Exception(':: [Error al actualizar el producto] :: ' . $error->getMessage());
        }

        return $success;
    }


    public function deleteProductInput($id)
    {
        $productInput = ProductInput::find($id);

        try {
            $success = $productInput->delete();
        } catch (QueryException $error) {
            $success = false;
            //throw new Exception(':: [Error al eliminar el producto] :: ' . $error->getMessage());
        }

        return $success;
    }


    public function getAllProductInputs()
    {
        return DB::table('product_inputs')->get();
    }


}