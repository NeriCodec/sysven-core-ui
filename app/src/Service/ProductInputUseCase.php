<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 23/11/2017
 * Time: 08:27 PM
 */

namespace App\src\Service;


use App\src\Common\Entities\ProductInputEntity;
use App\src\Common\Interfaces\IProductInputRepository;

class ProductInputUseCase implements IProductInputRepository
{
    private $productInputRepository;

    /**
     * ProductInputUseCase constructor.
     * @param $productInputRepository
     */
    public function __construct(IProductInputRepository $productInputRepository)
    {
        $this->productInputRepository = $productInputRepository;
    }

    /**
     * registerProductInput function.
     * @param $productInputEntity
     */
    public function registerProductInput(ProductInputEntity $productInputEntity)
    {
        return $this->productInputRepository->registerProductInput($productInputEntity);
    }

    /**
     * updateProductInput function.
     * @param $productInputEntity
     * @param $id
     */
    public function updateProductInput(ProductInputEntity $productInputEntity, $id)
    {
        return $this->productInputRepository->updateProductInput($productInputEntity, $id);
    }

    /**
     * deleteProductInput function.
     * @param $id
     */
    public function deleteProductInput($id)
    {
        return $this->productInputRepository->deleteProductInput($id);
    }


    public function getAllProductInputs()
    {
        return $this->productInputRepository->getAllProductInputs();
    }


}