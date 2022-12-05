<?php

namespace Tests\Unit;

use App\Services\CalculationService;
use PHPUnit\Framework\TestCase;

class CalculationTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->calculationService = new CalculationService();
    }

    public function test_getFibonacci()
    {
        $this->assertEquals($this->calculationService->getFibonacci(3), 2);
        $this->assertEquals($this->calculationService->getFibonacci(30), 832040);
    }

    public function test_isNaturalNumber()
    {
        $this->assertTrue($this->calculationService->isNaturalNumber("5"));
        $this->assertFalse($this->calculationService->isNaturalNumber("5.6"));
        $this->assertFalse($this->calculationService->isNaturalNumber("0"));
        $this->assertFalse($this->calculationService->isNaturalNumber("-1"));
        $this->assertFalse($this->calculationService->isNaturalNumber("Hello World!"));
    }
}
