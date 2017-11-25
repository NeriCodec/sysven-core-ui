<?php

namespace Tests\Unit;

use App\Product;
use App\src\Common\Entities\ProductShoppingCartEntity;
use App\src\Common\ShoppingCart;
use Tests\TestCase;
class ShoppingCartTest extends TestCase
{
    public function test_agregando_un_producto_carrito_session()
    {

        $cart = session()->has('cart') ? session()->get('get') : null;

        $shoppingCart = new ShoppingCart($cart);
        $productShoppingCart = new ProductShoppingCartEntity(
            'YUTY4324823s',
            'frappe',
            25,
            1
        );

        $productShoppingCart2 = new ProductShoppingCartEntity(
            'FSD78FSDF97',
            'smothie',
            45,
            1
        );

        $productShoppingCart3 = new ProductShoppingCartEntity(
            'FSD78FSDF97',
            'smothie',
            45,
            1
        );

        $productShoppingCart4 = new ProductShoppingCartEntity(
            'IDSAOUD',
            'coffe',
            50,
            1
        );

        $shoppingCart->add($productShoppingCart);
        $shoppingCart->add($productShoppingCart2);
        $shoppingCart->add($productShoppingCart3);
        $shoppingCart->add($productShoppingCart4);

        $shoppingCart->delete($productShoppingCart);
        $shoppingCart->delete($productShoppingCart2);
        $shoppingCart->delete($productShoppingCart3);
        $shoppingCart->delete($productShoppingCart4);

//        $shoppingCart->add($productShoppingCart);
        session()->put('cart', $shoppingCart->getAllProducts());

        var_dump($shoppingCart->getAllProducts());
        var_dump($shoppingCart->getTotalPrice());
        var_dump($shoppingCart->getQuantity());
    }

    public function test_verificar_el_total_de_productos()
    {
//        $oldCart = session()->has('cart') ? session()->get('get') : null;
//
//        $product1 =  Product::find(1);
//        $product2 =  Product::find(2);
//
//        $cart = new ShoppingCart($oldCart);
//
//        $cart->addProduct($product1);
//        $cart->addProduct($product2);
//
//        $mcart = $cart->getTotalItems();
//
//        var_dump($mcart);
//
//        $this->assertEquals($mcart["totalItems"], 2);
    }

    public function test_verificar_el_total_del_precio_productos()
    {
//        $oldCart = session()->has('cart') ? session()->get('get') : null;
//
//        $product1 =  Product::find(1);
//        $product2 =  Product::find(2);
//
//        $cart = new ShoppingCart($oldCart);
//
//        $cart->addProduct($product1);
//        $cart->addProduct($product2);
//
//        $mcart = $cart->getTotalPrice();
//
//        var_dump($mcart);
//
//        $this->assertEquals($mcart["totalPrice"], $product1->price + $product2->price);
    }
}
