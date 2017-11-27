<?php

namespace Tests\Unit;

use App;
use App\src\Common\Entities\SupplyEntity;
use App\src\Data\SupplyRepository;
use App\src\Service\SupplyUseCase;
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

        $supplieUseCase = new SupplyUseCase(new SupplyRepository());

        $supplie = factory(App\Supply::class)->make();

        $supplieEntity = new SupplyEntity(
            $supplie->name,
            $supplie->address
        );

        $success = $supplieUseCase->registerSupply($supplieEntity);

        $this->assertEquals($success, true);
    }
}
