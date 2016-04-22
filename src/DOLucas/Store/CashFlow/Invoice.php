<?php

namespace DOLucas\Store\CashFlow;

class Invoice
{

    private $client;
    private $value;
    private $date;

    public function __construct($client, $value, $date)
    {
        $this->client = $client;
        $this->value  = $value;
        $this->date   = $date;
    }

    public function getClient()
    {
        return $this->client;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getDate()
    {
        return $this->date;
    }
}