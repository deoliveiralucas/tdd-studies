<?php

namespace DOLucas\Store\CashFlow;

use DOLucas\Store\Test\TestCase;
use DOLucas\Store\CashFlow\InvoiceGenerator;
use DOLucas\Store\CashFlow\Order;
use Mockery;

class InvoiceGeneratorTest extends TestCase
{

    public function testShouldGenerateInvoiceWithTaxValueDiscounted()
    {
        $generator = new InvoiceGenerator([]);
        $order = new Order('Lucas', 1000, 1);

        $invoice = $generator->generate($order);

        $this->assertEquals(1000 * 0.94, $invoice->getValue(), null, 0.00001);
    }

    public function testShouldInvokeFurtherAction()
    {
        $dataAccess = Mockery::mock('DOLucas\Store\CashFlow\InvoiceDataAccess');
        $dataAccess->shouldReceive('execute')->andReturn(true);

        $sap = Mockery::mock('DOLucas\Store\CashFlow\SAP');
        $sap->shouldReceive('execute')->andReturn(true);

        $generator = new InvoiceGenerator([$dataAccess, $sap]);
        $order = new Order('Lucas', 1000, 1);

        $invoice = $generator->generate($order);

        $this->assertTrue($dataAccess->execute($invoice));
        $this->assertTrue($sap->execute($invoice));
        $this->assertNotNull($invoice);
        $this->assertInstanceOf('DOLucas\Store\CashFlow\Invoice', $invoice);
    }
}