<?php
/**
 * Created by PhpStorm.
 * User: Dux-044
 * Date: 23/11/2017
 * Time: 02:55 PM
 */

namespace Tests\Unit;

use App;
use App\src\Common\Entities\ProductEntity;
use App\src\Data\ProductRepository;
use App\src\Service\ProductUseCase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * Prueba para registrar un producto en la base de datos
     *
     * @return void
     */
    public function test_registrar_un_producto_a_database()
    {

        $productUseCase = new ProductUseCase(new ProductRepository());

        $product = factory(App\Product::class)->make();

        $productEntity = new ProductEntity(
            $product->name,
            $product->price
        );

        $success = $productUseCase->registerProduct($productEntity);

        $this->assertEquals($success, true);
    }

    public function test_obtenerTodosLosProductos()
    {
        $productUseCase = new ProductUseCase(new ProductRepository());

        $products = $productUseCase->getAllProducts();

        $this->assertEquals(7,count($products));
    }
}
