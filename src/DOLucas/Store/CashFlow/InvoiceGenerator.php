<?php

namespace DOLucas\Store\CashFlow;

use DOLucas\Store\CashFlow\Order;
use DOLucas\Store\CashFlow\InvoiceDataAccess;
use DOLucas\Store\CashFlow\SAP;
use \DateTime;

class InvoiceGenerator
{

    private $dataAccess;
    private $sap;

    public function __construct(InvoiceDataAccess $dataAccess, SAP $sap)
    {
        $this->dataAccess = $dataAccess;
        $this->sap = $sap;
    }

    public function generate(Order $order)
    {
        $invoice = new Invoice(
            $order->getClient(),
            $order->getTotalValue() * 0.94,
            new DateTime()
        );

        if ($this->dataAccess->persist($invoice) && 
            $this->sap->send($invoice)) {
            return $invoice;
        }

        return null;
    }
}