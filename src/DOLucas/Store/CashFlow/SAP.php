<?php

namespace DOLucas\Store\CashFlow;

use DOLucas\Store\CashFlow\Invoice;

class SAP implements IActionAfterGenerateInvoice
{

    public function execute(Invoice $invoice)
    {
        // send Invoice to SAP
    }
}