<?php

namespace App\src\Service;

use App\src\Common\Entities\ProductCreateEntity;
use App\src\Common\Interfaces\IProductCreateRepository;
use App\src\Data\ProductRepository;

class ProductCreateUseCase implements IProductCreateRepository
{
    private $productCreateRepository;

    /**
     * ProductCreateUseCase constructor.
     * @param $productCreateRepository
     */
    public function __construct(IProductCreateRepository $productCreateRepository)
    {
        $this->productCreateRepository = $productCreateRepository;
    }

    public function registerProductCreate(ProductCreateEntity $productCreateEntity)
    {
        return $this->productCreateRepository->registerProductCreate($productCreateEntity);
    }
}