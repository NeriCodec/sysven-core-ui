<?php

namespace App\src\Service;


use App\src\Common\Entities\ProductEntity;
use App\src\Common\Interfaces\IProductRepository;
use App\src\Data\ProductCreateRepository;

class ProductUseCase
    implements IProductRepository
{
    private $productRepository;

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
     * @return boolean
     */
    public function create(ProductEntity $productEntity)
    {
        if (count($productEntity->inputs) <= 0) {
            return false;
        }

        return $this->productRepository->create($productEntity);
    }

    /**
     * update function.
     * @param $productEntity
     * @return bool
     */
    public function update(ProductEntity $productEntity)
    {
        return $this->productRepository->update($productEntity);
    }

    /**
     * delete function.
     * @param $id
     */
    public function delete($id)
    {
        return $this->productRepository->delete($id);
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
     * read function.
     * @return array
     */
    public function getAll()
    {
        return $this->productRepository->getAll();
    }

    public function getProductByName($productName)
    {
        return $this->productRepository->getProductByName($productName);
    }


    /**
     * getAllProductsWithInputs function.
     * @return array
     */
    public function getAllProductsWithInputs()
    {
        $productsWithInputs   = [];
        $productCreateUseCase = new ProductCreateUseCase(new ProductCreateRepository());

        foreach ($this->getAll() as $product) {
            $productEntity = new ProductEntity(
                $product->id,
                $product->name,
                $product->price,
                $productCreateUseCase->getAllInputsOfProduct($product->id)
            );

            array_unshift($productsWithInputs, $productEntity);
        }

        return $productsWithInputs;
    }

    public function search($productName)
    {
        return $this->productRepository->search($productName);
    }


}