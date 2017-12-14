<?php

namespace App\src\Service;

use App\src\Common\Entities\ProductCreateEntity;
use App\src\Common\Interfaces\IProductCreateRepository;

class ProductCreateUseCase
    implements IProductCreateRepository
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

    /**
     * registerProductCreate function.
     * @param $productCreateEntity
     */
    public function create(ProductCreateEntity $productCreateEntity)
    {
        return $this->productCreateRepository->create($productCreateEntity);
    }

    /**
     * getAllProductCreted function.
     * @return array
     */
    public function getAll()
    {
        return $this->productCreateRepository->getAll();
    }

    public function update(ProductCreateEntity $productCreateEntity)
    {
        return $this->productCreateRepository->update($productCreateEntity);
    }

    public function delete($id)
    {
        return $this->productCreateRepository->delete($id);
    }


    public function getAllInputsOfProduct($product_id)
    {
        return $this->productCreateRepository->getAllInputsOfProduct($product_id);
    }
}