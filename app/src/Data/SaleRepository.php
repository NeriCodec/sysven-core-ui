<?php

namespace App\src\Data;

use App\Sale;
use App\src\Common\Entities\SaleEntity;
use App\src\Common\Interfaces\ISaleRepository;
use Illuminate\Support\Facades\DB;

class SaleRepository implements ISaleRepository
{

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

    public function getAllSaleDetailById($sale_id)
    {
        $salesDetails = DB::table('sales_details')
                          ->join('sales', 'sales_details.sales_id', '=', 'sales.id')
                          ->join('products', 'products.id', '=', 'sales_details.products_id')
                          ->select('products.id', 'products.name', 'products.price', 'sales.created_at')
                          ->where('sales.id', '=', $sale_id)
                          ->get();

        return ($salesDetails);
    }
}