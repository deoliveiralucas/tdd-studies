<?php

namespace DOLucas\Store\CashFlow;

class Order
{

    private $client;
    private $totalValue;
    private $quantityItens;

    public function __construct($client, $totalValue, $quantityItens)
    {
        $this->client = $client;
        $this->totalValue = $totalValue;
        $this->quantityItens = $quantityItens;
    }

    public function getClient()
    {
        return $this->client;
    }

    public function getTotalValue()
    {
        return $this->totalValue;
    }

    public function getQuantityItens()
    {
        return $this->quantityItens;
    }
}