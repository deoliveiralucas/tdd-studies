<?php

namespace DOLucas\Store\CashFlow;

use DOLucas\Store\CashFlow\Order;
use \DateTime;

class InvoiceGenerator
{

    public function generate(Order $order)
    {
        return new Invoice(
            $order->getClient(),
            $order->getTotalValue() * 0.94,
            new DateTime()
        );
    }
}