<?php

namespace App\src\Data;

use App\Sale;
use App\src\Common\Entities\SaleEntity;
use App\src\Common\Interfaces\ISaleRepository;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class SaleRepository
    implements ISaleRepository
{
    public function getAll()
    {
        try {
            $sales = Sale::all()->reverse();
        } catch (QueryException $error) {
            $sales = [];
            //throw new Exception(':: [Error al obtener los productos] :: ' . $error->getMessage());
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }

        return $sales;
    }


    public function removeMoney($amount)
    {
        // TODO: Implement removeMoney() method.
    }

    public function generateSale(SaleEntity $saleEntity)
    {
        $sale = new Sale;

        $sale->total      = $saleEntity->getTotal();
        $sale->created_at = $saleEntity->getCreatedAt();
        $sale->users_id   = $saleEntity->getUserId();

        return $sale->save();

    }

    public function canceledSale(SaleEntity $entity)
    {
        // TODO: Implement canceledSale() method.
    }

    public function getAllSaleByDate($date_start, $date_end)
    {
        // TODO: Implement getAllSaleByDate() method.
    }

}