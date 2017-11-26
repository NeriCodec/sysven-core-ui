<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 22/11/2017
 * Time: 10:50 PM
 */

namespace App\src\Common\Interfaces;


use App\src\Common\Entities\SaleEntity;

interface ISaleRepository
{
    public function removeMoney($amount);

    public function generateSale(SaleEntity $entity);

    public function canceledSale(SaleEntity $entity);

    public function getAllSaleByDate($date_start, $date_end);
}