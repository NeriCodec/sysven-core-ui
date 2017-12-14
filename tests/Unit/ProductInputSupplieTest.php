<?php

namespace Tests\Unit;

use App;
use App\src\Common\Entities\ProductInputSupplyEntity;
use App\src\Data\ProductInputSupplyRepository;
use App\src\Service\ProductInputSupplyUseCase;
use Tests\TestCase;

class ProductInputSupplieTest extends TestCase
{
    /**
     * Prueba para registrar un insumo del proveedor
     *
     * @return void
     */
    public function test_para_registrar_un_insumodeProveedor()
    {
        $productInputSupplieUseCase = new ProductInputSupplyUseCase(new ProductInputSupplyRepository());

        $productInputSupplie = factory(App\ProductInputSupplie::class)->make();

        $productInputSupplieEntity = new ProductInputSupplyEntity(
            $productInputSupplie->name,
            $productInputSupplie->price,
            $productInputSupplie->amount,
            $productInputSupplie->measure,
            $productInputSupplie->supplies_id

        );

        $success = $productInputSupplieUseCase->create($productInputSupplieEntity);

        $this->assertTrue($success, true);
    }
}
