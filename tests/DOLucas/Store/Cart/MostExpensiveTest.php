<?php

namespace DOLucas\Store\Cart;

use DOLucas\Store\Test\TestCase;
use DOLucas\Store\Cart\Cart;
use DOLucas\Store\Cart\MostExpensive;
use DOLucas\Store\Product\Product;

class MostExpensiveTest extends TestCase
{

    public function testShouldReturnZeroIfCartIsEmpty()
    {
        $cart = new Cart();

        $algorithm = new MostExpensive();
        $value = $algorithm->find($cart);

        $this->assertEquals(0, $value, null, 0.0001);
    }

    public function testShouldReturnItemValueIfCartHasOneElement()
    {
        $cart = new Cart();
        $cart->add(new Product('Freeze', 1, 900.00));

        $algorithm = new MostExpensive();
        $value = $algorithm->find($cart);

        $this->assertEquals(900.00, $value, null, 0.0001);
    }

    public function testShouldReturnMostExpensiveIfCartHasSeveralsElements()
    {
        $cart = new Cart();

        $cart->add(new Product('Freeze', 1, 900.00));
        $cart->add(new Product('TV', 1, 1500.00));
        $cart->add(new Product('Radio', 1, 750.00));

        $algorithm = new MostExpensive();
        $value = $algorithm->find($cart);

        $this->assertEquals(1500.00, $value, null, 0.0001);
    }
}
