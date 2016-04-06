<?php

namespace DOLucas\Store\Cart;

use DOLucas\Store\Test\TestCase;
use DOLucas\Store\Cart\Cart;
use DOLucas\Store\Cart\MostExpensive;

class MostExpensive extends TestCase
{

	public function testShouldReturnZeroIfCartIsEmpty()
	{
		$cart = new Cart();

		$algorithm = new MostExpensive();
		$value = $algorithm->find($cart);

		$this->assertEquals(0, $value, null, 0.0001);
	}
}