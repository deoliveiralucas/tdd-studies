<?php

require "./vendor/autoload.php";

use DOLucas\Examples\ConvertRomanNumerals;
use PHPUnit_Framework_TestCase as PHPUnit;

class ConvertRomanNumeralsTest extends PHPUnit
{

    public function testShouldUnderstandTheSymbolI()
    {
        $roman = new ConvertRomanNumerals();
        $number = $roman->convert("I");
        $this->assertEquals(1, $number);
    }

    public function testShouldUnderstandTheSymbolV()
    {
        $roman = new ConvertRomanNumerals();
        $number = $roman->convert("V");
        $this->assertEquals(5, $number);
    }

    public function testShouldUnderstandTheSymbolII()
    {
        $roman = new ConvertRomanNumerals();
        $number = $roman->convert("II");
        $this->assertEquals(2, $number);
    }

    public function testShouldUnderstandTheSymbolXXII()
    {
        $roman = new ConvertRomanNumerals();
        $number = $roman->convert("XXII");
        $this->assertEquals(22, $number);
    }

    public function testShouldUnderstandTheSymbolIX()
    {
        $roman = new ConvertRomanNumerals();
        $number = $roman->convert("IX");
        $this->assertEquals(9, $number);
    }

    public function testShouldUnderstandTheSymbolXXIV()
    {
        $roman = new ConvertRomanNumerals();
        $number = $roman->convert("XXIV");
        $this->assertEquals(24, $number);
    }
}
