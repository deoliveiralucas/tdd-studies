<?php

namespace DOLucas\Store\CashFlow;

use DOLucas\Store\Test\TestCase;
use DOLucas\Store\CashFlow\InvoiceGenerator;
use DOLucas\Store\CashFlow\Order;

class InvoiceGeneratorTest extends TestCase
{

    public function testShouldGenerateInvoiceWithTaxValueDiscounted()
    {
        $generator = new InvoiceGenerator();
        $order = new Order('Lucas', 1000, 1);

        $invoice = $generator->generate($order);

        $this->assertEquals(1000 * 0.94, $invoice->getValue(), null, 0.00001);
    }
}