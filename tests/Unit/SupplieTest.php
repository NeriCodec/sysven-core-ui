<?php

namespace Tests\Unit;

use App;
use App\src\Common\Entities\SupplieEntity;
use App\src\Data\SupplieRepository;
use App\src\Service\SupplieUseCase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SupplieTest extends TestCase
{
    /**
     * Prueba para registrar un proveedro en la base de datos
     *
     * @return void
     */
    public function test_registrar_un_proveedor_a_database()
    {

        $supplieUseCase = new SupplieUseCase(new SupplieRepository());

        $supplie = factory(App\Supplie::class)->make();

        $supplieEntity = new SupplieEntity(
            $supplie->name,
            $supplie->address
        );

        $success = $supplieUseCase->registerSupplie($supplieEntity);

        $this->assertEquals($success, true);
    }
}
