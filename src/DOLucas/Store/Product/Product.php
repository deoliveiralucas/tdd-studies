<?php

namespace DOLucas\Store\Product;

class Product
{

    private $name;
    private $unitaryValue;
    private $quantity;

    public function __construct($name, $unitaryValue, $quantity)
    {
        $this->name = $name;
        $this->unitaryValue = $unitaryValue;
        $this->quantity = $quantity;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getUnitaryValue()
    {
        return $this->unitaryValue;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function getTotalValue()
    {
        return $this->unitaryValue * $this->quantity;
    }
}
