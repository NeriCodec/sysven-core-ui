<?php

namespace Tests\Unit;

use App;
use App\src\Common\Entities\SaleDetailEntity;
use App\src\Data\SaleDetailRepository;
use App\src\Service\SaleDetailUseCase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SaleDetailTest extends TestCase
{
    /**
     * Prueba para registrar un detalle de venta
     *
     * @return void
     */
    public function test_registrarDetalleDeUnaVenta()
    {
        $saleDetailUseCase = new SaleDetailUseCase(new SaleDetailRepository());

        $saleDetail = factory(App\SaleDetail::class)->make();

        $saleDetailEntity = new SaleDetailEntity(
            $saleDetail->sales_id,
            $saleDetail->products_id,
            $saleDetail->quantity,
            $saleDetail->subtotal
        );

        $success = $saleDetailUseCase->registerSaleDatail($saleDetailEntity);

        $this->assertTrue($success, true);
    }
}
