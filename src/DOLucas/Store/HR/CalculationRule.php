<?php

namespace DOLucas\Store\HR;

use DOLucas\Store\HR\Employee;

abstract class CalculationRule
{

    public function calculate(Employee $employee)
    {
        $salary = $employee->getSalary();
        if ($salary > $this->limit()) {
            return $salary * $this->percentAboveLimit();
        }

        return $salary * $this->percentBasis();
    }

    protected function limit() {}

    protected function percentAboveLimit() {}

    protected function percentBasis() {}
}