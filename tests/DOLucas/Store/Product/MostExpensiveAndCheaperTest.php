<?php

namespace DOLucas\Store\Product;

require './vendor/autoload.php';

use DOLucas\Store\Cart\Cart;
use DOLucas\Store\Product\Product;
use DOLucas\Store\Product\MostExpensiveAndCheaper;

use PHPUnit_Framework_TestCase as PHPUnit;

class MostExpensiveAndCheaperTest extends PHPUnit
{
    public function testDecrescentOrder()
    {
        $cart = new Cart();

        $cart
            ->add(new Product("Freezer", 450.00))
            ->add(new Product("Blender", 250.00))
            ->add(new Product("Dishes", 70.00))
        ;

        $mostExpensiveAndCheaper = new MostExpensiveAndCheaper();
        $mostExpensiveAndCheaper->find($cart);

        $cheaper = $mostExpensiveAndCheaper->getCheaper()->getName();
        $this->assertEquals("Dishes", $cheaper);

        $mostExpensive = $mostExpensiveAndCheaper->getMostExpensive()->getName();
        $this->assertEquals("Freezer", $mostExpensive);
    }
}
