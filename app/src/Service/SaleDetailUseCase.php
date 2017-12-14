<?php

namespace App\src\Service;


use App\src\Common\Entities\SaleDetailEntity;
use App\src\Common\Interfaces\ISaleDetailRepository;

class SaleDetailUseCase
    implements ISaleDetailRepository
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

    public function getAll()
    {
        return $this->saleDetailRepository->getAll();
    }

    public function create(SaleDetailEntity $saleDetailEntity)
    {
        $productDetailExists = $this->productDetailExists($saleDetailEntity->getSalesId(), $saleDetailEntity->getProductsId());

        if ($productDetailExists) {
            return $this->saleDetailRepository->update($saleDetailEntity, $this->getProductDetailId($saleDetailEntity->getSalesId(), $saleDetailEntity->getProductsId()));
        }

        return $this->saleDetailRepository->create($saleDetailEntity);
    }

    private function productDetailExists($saleId, $producId)
    {
        $productsDetailsById = $this->getSaleDetailsById($saleId);
        foreach ($productsDetailsById as $product) {
            if ($product->id == $producId) {
                return true;
            }
        }

        return false;
    }

    private function getProductDetailId($saleId, $producId)
    {
        $productsDetailsById = $this->getSaleDetailsById($saleId);

        foreach ($productsDetailsById as $product) {
            if ($product->id == $producId) {
                return $this->getSaleDetailById($product->id);
            }
        }

        return -1;
    }

    public function update(SaleDetailEntity $saleDetailEntity, $id)
    {
        return $this->saleDetailRepository->update($saleDetailEntity, $id);
    }

    public function getSaleDetailById($id)
    {
        return $this->saleDetailRepository->getSaleDetailById($id);
    }


    public function getSaleDetailsById($id)
    {
        return $this->saleDetailRepository->getSaleDetailsById($id);
    }

}