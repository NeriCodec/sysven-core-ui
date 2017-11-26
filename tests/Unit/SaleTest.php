<?php

namespace Tests\Unit;

use App;
use App\src\Common\Entities\SaleEntity;
use App\src\Data\SaleRepository;
use App\src\Service\SaleUseCase;
use Tests\TestCase;

class SaleTest extends TestCase
{
    /**
     * Prueba para generar una venta
     *
     * @return void
     */
    public function test_para_generar_una_venta()
    {
        $saleUseCase = new SaleUseCase(new SaleRepository());

        $sale = factory(App\Sale::class)->make();

        $entity = new SaleEntity(
            $sale->total,
            $sale->created_at,
            $sale->users_id
        );

        $success = $saleUseCase->generateSale($entity);

        $this->assertTrue(true, $success);
    }

    /**
     * Prueba para obtener los detalles de venta, de una venta realizada
     *
     * @return void
     */
    public function test_obtenerDetallesDeVenta()
    {
        $saleUseCase = new SaleUseCase(new SaleRepository());

        $salesDetails = $saleUseCase->getAllSaleDetailById(1);

        $this->assertEquals(4, count($salesDetails));
    }
}
