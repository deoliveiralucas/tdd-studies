<?php

namespace DOLucas\Store\HR;

class Employee
{

	protected $name;
	protected $salary;
	protected $role;

	public function __construct($name, $salary, $role)
	{
		$this->name = $name;
		$this->salary = $salary;
		$this->role = $role;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getSalary()
	{
		return $this->salary;
	}

	public function getRole()
	{
		return $this->role;
	}
}
