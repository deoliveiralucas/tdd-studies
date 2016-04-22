<?php

namespace DOLucas\Store\CashFlow;

use DOLucas\Store\CashFlow\Order;
use DOLucas\Store\CashFlow\InvoiceDataAccess;
use DOLucas\Store\CashFlow\SAP;
use \DateTime;

class InvoiceGenerator
{

    private $actions;

    public function __construct($actions)
    {
        $this->actions = $actions;
    }

    public function generate(Order $order)
    {
        $invoice = new Invoice(
            $order->getClient(),
            $order->getTotalValue() * 0.94,
            new DateTime()
        );

        foreach ($this->actions as $action) {
            $action->execute($invoice);
        }

        return $invoice;
    }
}