<?php

namespace DOLucas\Store\HR;

use DOLucas\Store\HR\CalculationRule;
use DOLucas\Store\HR\Employee;

class FifteenOrTwentyFivePercent extends CalculationRule
{

    protected function percentBasis() 
    {
        return 0.85;
    }

    protected function percentAboveLimit() 
    {
        return 0.75;
    }

    protected function limit() 
    {
        return 2500;
    }
}