<?php

namespace DOLucas\Store\HR;

require './vendor/autoload.php';

use PHPUnit_Framework_TestCase as PHPUnit;

use DOLucas\Store\HR\SalaryCalculator;
use DOLucas\Store\HR\Employee;
use DOLucas\Store\HR\TableRoles;

class SalaryCalculatorTest extends PHPUnit
{

    public function testCalculationSalaryDevelopersWithSalaryUnderTheLimit()
    {
        $calculator = new SalaryCalculator();
        $developer = new Employee("Andre", 1500.0, TableRoles::DEVELOPER);

        $salary = $calculator->calculateSalary($developer);

        $this->assertEquals(1500.0 * 0.9, $salary, null, 0.00001);
    }

    public function testCalculationSalaryDevelopersWithSalaryAboveTheLimit()
    {
        $calculator = new SalaryCalculator();
        $developer = new Employee("Andre", 4000.0, TableRoles::DEVELOPER);

        $salary = $calculator->calculateSalary($developer);

        $this->assertEquals(4000.0 * 0.8, $salary, null, 0.00001);
    }

    public function testCalculationSalaryDBAsWithSalaryUnderTheLimit()
    {
        $calculator = new SalaryCalculator();
        $dba = new Employee("Andre", 500.0, TableRoles::DBA);

        $salary = $calculator->calculateSalary($dba);

        $this->assertEquals(500.0 * 0.85, $salary, null, 0.00001);
    }
}
