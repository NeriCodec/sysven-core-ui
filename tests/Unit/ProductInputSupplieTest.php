<?php

namespace Tests\Unit;

use App;
use App\src\Common\Entities\ProductInputSupplieEntity;
use App\src\Data\ProductInputSupplieRepository;
use App\src\Service\ProductInputSupplieUseCase;
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
        $productInputSupplieUseCase = new ProductInputSupplieUseCase(new ProductInputSupplieRepository());

        $productInputSupplie = factory(App\ProductInputSupplie::class)->make();

        $productInputSupplieEntity = new ProductInputSupplieEntity(
            $productInputSupplie->name,
            $productInputSupplie->price,
            $productInputSupplie->amount,
            $productInputSupplie->measure,
            $productInputSupplie->supplies_id

        );

        $success = $productInputSupplieUseCase->registerProductInputSupplie($productInputSupplieEntity);

        $this->assertTrue($success, true);
    }
}
