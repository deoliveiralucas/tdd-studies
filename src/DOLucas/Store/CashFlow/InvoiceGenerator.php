<?php

namespace DOLucas\Store\CashFlow;

use DOLucas\Store\CashFlow\Order;
use DOLucas\Examples\ClockInterface;
use DOLucas\Store\Taxes\TableInterface;

class InvoiceGenerator
{

    private $actions;
    private $clock;
    private $table;

    public function __construct($actions, ClockInterface $clock, TableInterface $table)
    {
        $this->actions = $actions;
        $this->clock = $clock;
        $this->table = $table;
    }

    public function generate(Order $order)
    {
        $tableValue = $this->table->toValue($order->getTotalValue());
        $totalValue = $order->getTotalValue() - ($order->getTotalValue() * $tableValue);

        $invoice = new Invoice(
            $order->getClient(),
            $totalValue,
            $this->clock->today()
        );

        foreach ($this->actions as $action) {
            $action->execute($invoice);
        }

        return $invoice;
    }
}