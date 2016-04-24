<?php

namespace DOLucas\Store\Taxes;

interface TableInterface
{
    public function toValue($value);
}