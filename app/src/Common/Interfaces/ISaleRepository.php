<?php

namespace App\src\Common\Interfaces;


use App\src\Common\Entities\SaleEntity;

interface ISaleRepository
{
    public function getAll();

    public function removeMoney($amount);

    public function generateSale(SaleEntity $entity);

    public function canceledSale(SaleEntity $entity);

    public function getAllSaleByDate($date_start, $date_end);
}