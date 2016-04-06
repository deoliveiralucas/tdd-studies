<?php

namespace DOLucas\Store\Cart;

use DOLucas\Store\Cart\Cart;

class MostExpensive
{

    public function find(Cart $cart)
    {
        if (count($cart->getProducts()) === 0) {
            return 0;
        }

        $mostExpensive = $cart->getProducts()[0]->getTotalValue();
        foreach ($cart->getProducts() as $product) {
            if ($mostExpensive < $product->getTotalValue()) {
                $mostExpensive = $product->getTotalValue();
            }
        }

        return $mostExpensive;
    }
}
