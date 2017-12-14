<?php

namespace App\src\Service;

use App\src\Common\Entities\SaleEntity;
use App\src\Common\Interfaces\ISaleRepository;

class SaleUseCase
    implements ISaleRepository
{
    private $saleRepository;

    /**
     * SaleUseCase constructor.
     * @param $saleRepository
     */
    public function __construct(ISaleRepository $saleRepository)
    {
        $this->saleRepository = $saleRepository;
    }

    /**
     * removeMoney function.
     * @param $amount
     */
    public function removeMoney($amount)
    {
        // TODO: Implement removeMoney() method.
    }

    /**
     * generateSale function.
     * @param $entity
     */
    public function generateSale(SaleEntity $entity)
    {
        return $this->saleRepository->generateSale($entity);
    }

    /**
     * canceledSale function.
     * @param $entity
     */
    public function canceledSale(SaleEntity $entity)
    {
        // TODO: Implement canceledSale() method.
    }

    /**
     * getAllSaleByDate function.
     * @param $date_start
     * @param $date_end
     */
    public function getAllSaleByDate($date_start, $date_end)
    {
        // TODO: Implement getAllSaleByDate() method.
    }
}