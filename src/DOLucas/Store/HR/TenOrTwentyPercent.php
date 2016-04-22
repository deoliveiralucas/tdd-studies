<?php

namespace DOLucas\Store\HR;

use DOLucas\Store\HR\CalculationRule;
use DOLucas\Store\HR\Employee;

class TenOrTwentyPercent extends CalculationRule
{

    protected function percentBasis() 
    {
        return 0.9;
    }

    protected function percentAboveLimit() 
    {
        return 0.8;
    }

    protected function limit() 
    {
        return 3000;
    }
}