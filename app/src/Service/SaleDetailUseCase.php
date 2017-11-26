<?php

namespace App\src\Service;


use App\src\Common\Entities\SaleDetailEntity;
use App\src\Common\Interfaces\ISaleDetailRepository;

class SaleDetailUseCase implements ISaleDetailRepository
{
    private $saleDetailRepository;

    /**
     * SaleDetailUseCase constructor.
     * @param $saleDetailRepository
     */
    public function __construct(ISaleDetailRepository $saleDetailRepository)
    {
        $this->saleDetailRepository = $saleDetailRepository;
    }

    public function registerSaleDatail(SaleDetailEntity $saleDetailEntity)
    {
        return $this->saleDetailRepository->registerSaleDatail($saleDetailEntity);
    }

    public function getSaleDetailsById($id)
    {
        return $this->saleDetailRepository->getSaleDetailsById($id);
    }

}