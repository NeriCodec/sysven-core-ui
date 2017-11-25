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
            $sale->num_sale,
            $sale->num_articles,
            $sale->detail,
            $sale->users_id
        );

        $success = $saleUseCase->generateSale($entity);

        $this->assertTrue($success, true);
    }
}
