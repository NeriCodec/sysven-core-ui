<?php

namespace App\src\Common;

use App\src\Common\Entities\ProductShoppingCartEntity;

class ShoppingCart

{
    private $cart = null;
    private $totalPrice = 0;
    private $quantityProducts = 0;

    public function __construct($cart)
    {
        if ($cart) {
            $this->cart             = $cart;
            $this->totalPrice       = $cart->totalPrice;
            $this->quantityProducts = $cart->quantityProducts;
        }
    }

    public function add(ProductShoppingCartEntity $productShoppingCart)
    {
        $stored = [
            'quantityStored' => 0,
            'priceStored' => $productShoppingCart->getPrice(),
            'name' => $productShoppingCart->getName(),
            'price' => $productShoppingCart->getPrice()
        ];

        if ($this->cart) {
            if (array_key_exists($productShoppingCart->getSlug(), $this->cart)) {
                $stored = $this->cart[$productShoppingCart->getSlug()];
            }
        }

        $stored['quantityStored']++;
        $stored['priceStored']                       = $productShoppingCart->getPrice() * $stored['quantityStored'];
        $this->cart[$productShoppingCart->getSlug()] = $stored;

        $this->quantityProducts++;
        $this->totalPrice += $productShoppingCart->getPrice();
    }

    public function delete(ProductShoppingCartEntity $productShoppingCart)
    {
        $stored = [
            'quantityStored' => $this->cart[$productShoppingCart->getSlug()]['quantityStored']--,
            'priceStored' => $productShoppingCart->getPrice(),
            'name' => $productShoppingCart->getName(),
            'price' => $productShoppingCart->getPrice()
        ];

//        $stored['quantityStored']--;
//        $stored['priceStored'] -= $productShoppingCart->getPrice();

        //unset($this->cart[$productShoppingCart->getSlug()]);

        $this->cart[$productShoppingCart->getSlug()] = $stored;

        $this->quantityProducts--;
        $this->totalPrice -= $productShoppingCart->getPrice();

    }

    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    public function getQuantity()
    {
        return $this->quantityProducts;
    }

    public function getAllProducts()
    {
        return $this->cart;
    }
}