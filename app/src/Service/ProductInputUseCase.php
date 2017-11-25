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
     * ProductInputUseCase function.
     * @param $productInputEntity
     */
    public function registerProductInput(ProductInputEntity $productInputEntity)
    {
        return $this->productInputRepository->registerProductInput($productInputEntity);
    }
}