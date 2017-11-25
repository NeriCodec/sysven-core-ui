<?php

namespace App\src\Service;


use App\src\Common\Entities\ProductInputSupplieEntity;
use App\src\Common\Interfaces\IProductInputSupplieRepository;

class ProductInputSupplieUseCase implements IProductInputSupplieRepository
{

    private $productInputSupplieRepository;

    /**
     * ProductInputSupplieUseCase constructor.
     * @param $productInputSupplieRepository
     */
    public function __construct(IProductInputSupplieRepository $productInputSupplieRepository)
    {
        $this->productInputSupplieRepository = $productInputSupplieRepository;
    }


    /**
     * registerProductInputSupplie function.
     * @param $productInputSupplieEntity
     * @return boolean
     */
    public function registerProductInputSupplie(ProductInputSupplieEntity $productInputSupplieEntity)
    {
        return $this->productInputSupplieRepository->registerProductInputSupplie($productInputSupplieEntity);
    }
}