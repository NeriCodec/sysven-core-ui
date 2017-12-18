<?php

namespace App\src\Service;


use App\src\Common\Entities\ProductInputSupplyEntity;
use App\src\Common\Interfaces\IProductInputSupplyRepository;

class ProductInputSupplyUseCase
    implements IProductInputSupplyRepository
{

    private $productInputSupplieRepository;

    /**
     * ProductInputSupplyUseCase constructor.
     * @param $productInputSupplieRepository
     */
    public function __construct(IProductInputSupplyRepository $productInputSupplieRepository)
    {
        $this->productInputSupplieRepository = $productInputSupplieRepository;
    }

    /**
     * registerProductInputSupplie function.
     * @param $productInputSupplieEntity
     * @return boolean
     */
    public function create(ProductInputSupplyEntity $productInputSupplieEntity)
    {
        return $this->productInputSupplieRepository->create($productInputSupplieEntity);
    }

    public function getAll()
    {
        return $this->productInputSupplieRepository->getAll();
    }

    public function update(ProductInputSupplyEntity $productInputSupplieEntity)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function getInputProductByName($name_input)
    {
        return $this->productInputSupplieRepository->getInputProductByName($name_input);
    }

    public function updateQuantityOfInputProductById($id, $quantity)
    {
        return $this->productInputSupplieRepository->updateQuantityOfInputProductById($id, $quantity);
    }
}