<?php

namespace DOLucas\Store\CashFlow;

use DOLucas\Store\CashFlow\Invoice;

interface IActionAfterGenerateInvoice
{
    public function execute(Invoice $invoice);
}