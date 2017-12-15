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

    /**
     * Agrega un detalle de venta.
     * create function.
     * @param $saleDetailEntity
     * @return bool
     */
    public function add(SaleDetailEntity $saleDetailEntity)
    {
        $existsProduct = $this->existsProductIntoSaleDetail($saleDetailEntity->getSalesId(), $saleDetailEntity->getProductsId());

        if ($existsProduct) {
            return $this->saleDetailRepository->incrementQuantityOfProductOfSaleDetail($this->getIdOfSaleDetail($saleDetailEntity->getSalesId(), $saleDetailEntity->getProductsId()));
        }

        return $this->saleDetailRepository->add($saleDetailEntity);
    }

    /**
     * Verifica si un producto dentro del detalle venta existe.
     * productDetailExists function.
     * @param $saleId
     * @param $producId
     * @return bool
     */
    private function existsProductIntoSaleDetail($saleId, $producId)
    {
        $saleDetails = $this->getSaleDetailsById($saleId);

        foreach ($saleDetails as $saleDetail) {
            if ($saleDetail->productId == $producId) {
                return true;
            }
        }

        return false;
    }

    /**
     * Obtiene el id de detalle venta.
     * productDetailExists function.
     * @param $saleId
     * @param $producId
     * @return int (id de detalle venta)
     */
    private function getIdOfSaleDetail($saleId, $producId)
    {
        $saleDetails = $this->getSaleDetailsById($saleId);

        foreach ($saleDetails as $saleDetail) {
            if ($saleDetail->productId == $producId) {
                return $this->getIdOfSaleDetailByProductId($saleDetail->productId);
            }
        }

        return -1;
    }

    public function incrementQuantityOfProductOfSaleDetail($saleId)
    {
        return $this->saleDetailRepository->incrementQuantityOfProductOfSaleDetail($saleId);
    }

    public function removeQuantityOfProductOfSaleDetail($saleId)
    {
        return $this->saleDetailRepository->removeQuantityOfProductOfSaleDetail($saleId);
    }


    public function delete($saleId)
    {
        $product = $this->getProductOfSaleDetailById($saleId);

        if ($this->hasMoreThanOne($product)) {
            return $this->removeQuantityOfProductOfSaleDetail($saleId);
        }

        return $this->saleDetailRepository->delete($saleId);
    }
    /**
     * Verifica si un producto contiene mas de uno.
     * hasMoreOfOne function.
     * @param $product
     * @return bool
     */
    private function hasMoreThanOne($product)
    {
        if ($product->quantity >= 2)
        {
            return true;
        }

        return false;
    }

    /**
     * Obtiene un producto del detalle venta por el id_producto
     * getProductOfSaleDetailByProductId function.
     * @param $saleDetailId
     */
    public function getProductOfSaleDetailById($saleDetailId)
    {
        return $this->saleDetailRepository->getProductOfSaleDetailById($saleDetailId);
    }


    /**
     * Obtiene el id de detalle venta por medio del id_producto.
     * getIdOfSaleDetailByProductId function.
     * @param $productId
     */
    public function getIdOfSaleDetailByProductId($productId)
    {
        return $this->saleDetailRepository->getIdOfSaleDetailByProductId($productId);
    }


    public function getSaleDetailsById($saleId)
    {
        return $this->saleDetailRepository->getSaleDetailsById($saleId);
    }

}