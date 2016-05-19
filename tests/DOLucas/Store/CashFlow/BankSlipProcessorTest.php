<?php

namespace DOLucas\Store\CashFLlow;

use DOLucas\Store\Test\TestCase;
use DOLucas\Store\CashFlow\BankSlipProcessor;
use DOLucas\Store\CashFlow\Invoice;
use DOLucas\Store\CashFlow\BankSlip;
use ArrayObject;

class BankSlipeProcessorTest extends TestCase
{

    public function testShouldProcessBankSlipPayment()
    {
        /*
        $processor = new BankSlipProcessor();

        $invoice = new Invoice('Client', 150.0);
        $bankSlip = new BankSlip(150.0);

        $bankSlips = new ArrayObject();
        $bankSlips->append($bankSlip);

        $processor->process($bankSlips, $invoice);

        $this->assertEquals(1, count($invoice->getPayments()));
        $this->assertEquals(150.0, $invoice->getPayments()[0]->getValue(), null, 0.00001);
        */
    }
}

