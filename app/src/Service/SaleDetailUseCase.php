<?php

namespace App\src\Service;


use App\src\Common\Entities\SaleDetailEntity;
use App\src\Common\Interfaces\ISaleDetailRepository;
use App\src\Data\ProductCreateRepository;
use App\src\Data\ProductInputSupplyRepository;

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

    /**
     * Obtiene todos los detalles de venta
     * getAll function.
     * @return array
     */
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
        $this->updateProductInputSupply($saleDetailEntity->getProductsId(), '-');

        $existsProduct = $this->existsProductIntoSaleDetail($saleDetailEntity->getSalesId(), $saleDetailEntity->getProductsId());

        if ($existsProduct) {
            return $this->saleDetailRepository->incrementQuantityOfProductOfSaleDetail($this->getIdOfSaleDetail($saleDetailEntity->getSalesId(), $saleDetailEntity->getProductsId()));
        }

        return $this->saleDetailRepository->add($saleDetailEntity);
    }

    /**
     * Incrementa la cantidad de un producto
     * incrementQuantityOfProductOfSaleDetail function.
     * @param $saleId
     */
    public function incrementQuantityOfProductOfSaleDetail($saleId)
    {
        return $this->saleDetailRepository->incrementQuantityOfProductOfSaleDetail($saleId);
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

    /**
     * Elimina un detalle venta
     * delete function.
     * @param $saleId
     */
    public function delete($saleId)
    {
        $product = $this->getProductOfSaleDetailById($saleId);
        $this->updateProductInputSupply($product->productId, '+');

        if ($this->hasMoreThanOne($product)) {
            return $this->removeQuantityOfProductOfSaleDetail($saleId);
        }

        return $this->saleDetailRepository->delete($saleId);
    }

    /**
     * Remueve una unidad de la cantidad de un producto
     * removeQuantityOfProductOfSaleDetail function.
     * @param $saleId
     */
    public function removeQuantityOfProductOfSaleDetail($saleId)
    {
        return $this->saleDetailRepository->removeQuantityOfProductOfSaleDetail($saleId);
    }

    /**
     * Verifica si un producto contiene mas de uno.
     * hasMoreOfOne function.
     * @param $product
     * @return bool
     */
    private function hasMoreThanOne($product)
    {
        if ($product->quantity >= 2) {
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

    /**
     * Obtiene los detalles de venta por id.
     * getSaleDetailsById function.
     * @param $saleId
     */
    public function getSaleDetailsById($saleId)
    {
        return $this->saleDetailRepository->getSaleDetailsById($saleId);
    }

    /**
     * Actualiza la cantidad de un insumo del proveedor
     * updateProductInputSupply function.
     * @param $id (del producto)
     * @param $operator (resta o suma)
     */
    private function updateProductInputSupply($id, $operator)
    {
        // Obtener los insumos de un producto
        $productCreateUseCase = new ProductCreateUseCase(new ProductCreateRepository());
        $inputsProduct        = $productCreateUseCase->getAllInputsOfProduct($id);
        // Obtener los insumos del proveedor por nombre
        $productInputSupply = new ProductInputSupplyUseCase(new ProductInputSupplyRepository());
        // Descontar los insumos de Insumos del proveedor
        foreach ($inputsProduct as $inputProduct) {
            $myProductInputSupply = $productInputSupply->getInputProductByName($inputProduct->name_input);
            $operator == '-' ? $newQuantity = $myProductInputSupply->quantity - $inputProduct->quantity : $newQuantity = $myProductInputSupply->quantity + $inputProduct->quantity;
            // Actualizar los insumos del proveedor con las nuevas cantidades
            $productInputSupply->updateQuantityOfInputProductById($myProductInputSupply->id, $newQuantity);
        }
    }

}