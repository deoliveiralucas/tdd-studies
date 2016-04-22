<?php

namespace DOLucas\Store\CashFlow;

use DOLucas\Store\Test\TestCase;
use DOLucas\Store\CashFlow\InvoiceGenerator;
use DOLucas\Store\CashFlow\Order;
use Mockery;

class InvoiceGeneratorTest extends TestCase
{

    protected $generator;
    protected $dataAccess;
    protected $sap;

    public function setUp()
    {
        $this->dataAccess = Mockery::mock('DOLucas\Store\CashFlow\InvoiceDataAccess');
        $this->dataAccess->shouldReceive('persist')->andReturn(true);

        $this->sap = Mockery::mock('DOLucas\Store\CashFlow\SAP');
        $this->sap->shouldReceive('send')->andReturn(true);

        $this->generator = new InvoiceGenerator($this->dataAccess, $this->sap);
    }

    public function testShouldGenerateInvoiceWithTaxValueDiscounted()
    {
        $order = new Order('Lucas', 1000, 1);

        $invoice = $this->generator->generate($order);

        $this->assertEquals(1000 * 0.94, $invoice->getValue(), null, 0.00001);
    }

    public function testShouldPersistGeneratedInvoice()
    {
        $order = new Order('Lucas', 1000, 1);

        $invoice = $this->generator->generate($order);

        $this->assertTrue($this->dataAccess->persist($invoice));
        $this->assertNotNull($invoice);
    }

    public function testShouldSendGeneratedInvoiceToSAP()
    {
        $order = new Order('Lucas', 1000, 1);

        $invoice = $this->generator->generate($order);

        $this->assertTrue($this->sap->send($invoice));
        $this->assertEquals(1000 * 0.94, $invoice->getValue(), null, 0.00001);
    }
}