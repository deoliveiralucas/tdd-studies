<?php

namespace DOLucas\Store\Product;

use DOLucas\Store\Cart\Cart;

class MostExpensiveAndCheaper
{
    
    private $cheaper;
    private $mostExpensive;

    public function find(Cart $cart)
    {
        foreach ($cart->getProducts() as $product) {
            if (empty($this->cheaper)
            || $product->getValue() < $this->cheaper->getValue()) {
                $this->cheaper = $product;
            }

            if (empty($this->mostExpensive)
            || $product->getValue() > $this->mostExpensive->getValue()) {
                $this->mostExpensive = $product;
            }
        }
    }

    public function getCheaper()
    {
        return $this->cheaper;
    }

    public function getMostExpensive()
    {
        return $this->mostExpensive;
    }
}
