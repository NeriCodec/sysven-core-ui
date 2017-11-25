<?php

namespace App\src\Data;

use App\Sale;
use App\src\Common\Entities\SaleEntity;
use App\src\Common\Interfaces\ISaleRepository;
class SaleRepository implements ISaleRepository
{

    public function removeMoney($amount)
    {
        // TODO: Implement removeMoney() method.
    }

    public function generateSale(SaleEntity $saleEntity)
    {
        $sale = new Sale;

        $sale->num_articles = $saleEntity->getNumArticles();
        $sale->total = $saleEntity->getTotal();
        $sale->detail = $saleEntity->getDetail();
        $sale->users_id = $saleEntity->getUserId();

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