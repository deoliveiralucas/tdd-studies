<?php

namespace DOLucas\Examples;

class ConvertRomanNumerals
{

    protected $table = [
        "I" => 1,
        "V" => 5,
        "X" => 10,
        "L" => 50,
        "C" => 100,
        "D" => 500,
        "M" => 1000
    ];

    public function convert($romanNumber)
    {
        $sum = 0;
        $lastSymbolFromRight = 0;
        foreach (array_reverse(str_split($romanNumber)) as $symbol) {
            $actual = 0;
            if (array_key_exists($symbol, $this->table)) {
                $actual = $this->table[$symbol];
            }

            $multiply = 1;
            if ($actual < $lastSymbolFromRight) {
                $multiply = -1;
            }

            $sum += ($actual * $multiply);

            $lastSymbolFromRight = $actual;
        }

        return $sum;
    }
}
