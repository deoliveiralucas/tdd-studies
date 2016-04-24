<?php

namespace DOLucas\Store\CashFlow;

use DOLucas\Store\Test\TestCase;
use DOLucas\Store\CashFlow\InvoiceGenerator;
use DOLucas\Store\CashFlow\Order;
use DOLucas\Examples\ClockSystem;
use Mockery;

class InvoiceGeneratorTest extends TestCase
{

    public function testShouldGenerateInvoiceWithTaxValueDiscounted()
    {
        $table = Mockery::mock('DOLucas\Store\Taxes\TableInterface');
        $table->shouldReceive('toValue')->with(1000.0)->andReturn(0.2);

        $generator = new InvoiceGenerator([], new ClockSystem(), $table);
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

        $table = Mockery::mock('DOLucas\Store\Taxes\TableInterface');
        $table->shouldReceive('toValue')->with(1000.0)->andReturn(0.2);

        $generator = new InvoiceGenerator([$dataAccess, $sap], new ClockSystem(), $table);
        $order = new Order('Lucas', 1000, 1);

        $invoice = $generator->generate($order);

        $this->assertTrue($dataAccess->execute($invoice));
        $this->assertTrue($sap->execute($invoice));
        $this->assertNotNull($invoice);
        $this->assertInstanceOf('DOLucas\Store\CashFlow\Invoice', $invoice);
    }

    public function testShouldFindTableToCalculateValue()
    {
        $table = Mockery::mock('DOLucas\Store\Taxes\TableInterface');
        $table->shouldReceive('toValue')->with(1000.0)->andReturn(0.2);

        $generator = new InvoiceGenerator([], new ClockSystem(), $table);
        $order = new Order('Lucas', 1000.0, 1);

        $invoice = $generator->generate($order);

        $this->assertEquals(1000 * 0.8, $invoice->getValue(), null, 0.00001);
    }
}