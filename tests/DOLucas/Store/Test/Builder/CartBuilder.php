<?php

namespace DOLucas\Store\Test\Builder;

use DOLucas\Store\Cart\Cart;
use DOLucas\Store\Product\Product;

class CartBuilder
{

    public $cart;

    public function __construct()
    {
        $this->cart = new Cart();
    }

    public function withItens()
    {
        $values = func_get_args();
        foreach ($values as $value) {
            $this->cart->add(new Product('Item', $value, 1));
        }
        return $this;
    }

    public function build()
    {
        return $this->cart;
    }
}
