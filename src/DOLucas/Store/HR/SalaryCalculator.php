<?php

namespace DOLucas\Store\HR;

use DOLucas\Store\HR\Employee;
use DOLucas\Store\HR\TableRoles;

class SalaryCalculator
{

    public function calculateSalary(Employee $employee)
    {
        $role = new Role($employee->getRole());

        return $role->getRule()->calculate($employee);
    }
}
