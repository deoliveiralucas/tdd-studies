<?php

namespace DOLucas\Store\Cart;

use DOLucas\Store\Test\TestCase;
use DOLucas\Store\Cart\Cart;
use DOLucas\Store\Product\Product;

class CartTest extends TestCase
{

    private $cart;

    protected function setUp()
    {
        $this->cart = new Cart();
        parent::setUp();
    }

    public function testShouldReturnZeroIfCartIsEmpty()
    {
        $value = $this->cart->mostExpensive();

        $this->assertEquals(0, $value, null, 0.0001);
    }

    public function testShouldReturnItemValueIfCartHasOneElement()
    {
        $this->cart->add(new Product('Freeze', 1, 900.00));

        $value = $this->cart->mostExpensive();

        $this->assertEquals(900.00, $value, null, 0.0001);
    }

    public function testShouldReturnMostExpensiveIfCartHasSeveralsElements()
    {
        $this->cart->add(new Product('Freeze', 1, 900.00));
        $this->cart->add(new Product('TV', 1, 1500.00));
        $this->cart->add(new Product('Radio', 1, 750.00));

        $value = $this->cart->mostExpensive();

        $this->assertEquals(1500.00, $value, null, 0.0001);
    }
}
