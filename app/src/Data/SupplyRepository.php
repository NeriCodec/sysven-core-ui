<?php

namespace App\src\Data;

use App\src\Common\Entities\SupplyEntity;
use App\src\Common\Interfaces\ISupplyRepository;
use App\Supply;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class SupplyRepository
    implements ISupplyRepository
{
    public function create(SupplyEntity $supplyEntity)
    {
        $supplie = new Supply;

        $supplie->name    = $supplyEntity->getName();
        $supplie->address = $supplyEntity->getAddress();

        return $supplie->save();
    }

    public function update(SupplyEntity $supplyEntity, $id)
    {
        $supplie = Supply::find($id);

        $supplie->name    = $supplyEntity->getName();
        $supplie->address = $supplyEntity->getAddress();

        try {
            $success = $supplie->save();
        } catch (QueryException $error) {
            $success = false;
            //throw new Exception(':: [Error al actualizar el producto] :: ' . $error->getMessage());
        }

        return $success;
    }

    public function delete($id)
    {
        $supply = Supply::find($id);

        try {
            $success = $supply->delete();
        } catch (QueryException $error) {
            $success = false;
            //throw new Exception(':: [Error al eliminar el producto] :: ' . $error->getMessage());
        }

        return $success;
    }

    public function getAll()
    {
        return DB::table('supplies')->get();
    }


}