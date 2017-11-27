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
     * @param $inputs array
     * @return boolean
     */
    public function registerProduct(ProductEntity $productEntity, $inputs)
    {
        if (count($inputs) <= 0) {
            return false;
        }

        return $this->productRepository->registerProduct($productEntity, $inputs);
    }

    /**
     * updateProduct function.
     * @param $productEntity
     * @param $id
     */
    public function updateProduct(ProductEntity $productEntity, $id)
    {
        return $this->productRepository->updateProduct($productEntity, $id);
    }

    /**
     * deleteProduct function.
     * @param $id
     */
    public function deleteProduct($id)
    {
        return $this->productRepository->deleteProduct($id);
    }

    /**
     * getProductById function.
     * @param $id
     */
    public function getProductById($id)
    {
        return $this->productRepository->getProductById($id);
    }

    /**
     * getAllProductInputs function.
     * @param $product_id
     */
    public function getAllProductInputs($product_id)
    {
        return $this->productRepository->getAllProductInputs($product_id);
    }

    /**
     * getAllProducts function.
     * @return array
     */
    public function getAllProducts()
    {
        return $this->productRepository->getAllProducts();
    }


}