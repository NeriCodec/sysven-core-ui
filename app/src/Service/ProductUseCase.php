<?php
/**
 * Created by PhpStorm.
 * User: Dux-044
 * Date: 23/11/2017
 * Time: 02:44 PM
 */

namespace App\src\Service;


use App\src\Common\Entities\ProductEntity;
use App\src\Common\Interfaces\IProductRepository;

class ProductUseCase implements IProductRepository
{
    public $productRepository;

    /**
     * ProductUseCase constructor.
     * @param $productRepository
     */
    public function __construct(IProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * registerProduct function.
     * @param $productEntity
     */
    public function registerProduct(ProductEntity $productEntity)
    {
        return $this->productRepository->registerProduct($productEntity);
    }

    /**
     * updateProduct function.
     * @param $productEntity
     * @param $id
     */
    public function updateProduct(ProductEntity $productEntity, $id)
    {
        // TODO: Implement updateProduct() method.
    }

    /**
     * deleteProduct function.
     * @param $id
     */
    public function deleteProduct($id)
    {
        // TODO: Implement deleteProduct() method.
    }
}