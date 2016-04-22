<?php

namespace DOLucas\Store\CashFlow;

use DOLucas\Store\CashFlow\Invoice;

class InvoiceDataAccess implements IActionAfterGenerateInvoice
{

    public function execute(Invoice $invoice)
    {
        // persist Invoice
    }
}