<?php

namespace DOLucas\Store\HR;

use DOLucas\Store\HR\Employee;
use DOLucas\Store\HR\TableRoles;

class SalaryCalculator
{

    public function calculateSalary(Employee $employee)
    {
        if ($employee->getRole() === TableRoles::DEVELOPER) {
            if ($employee->getSalary() > 3000) {
                return $employee->getSalary() * 0.8;
            }

            return $employee->getSalary() * 0.9;
        }

        return $employee->getSalary() * 0.85;
    }
}
