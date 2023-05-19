<?php

declare(strict_types=1);

namespace Deg540\StringCalculatorPHP\Test;

use Deg540\StringCalculatorPHP\StringCalculator;
use PHPUnit\Framework\TestCase;

final class StringCalculatorTest extends TestCase
{
    private StringCalculator $stringCalculator;
    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->stringCalculator = new StringCalculator();
    }


    public function test0IfStringEmpty()
    {
        $sumResult = $this->stringCalculator->add("");

        $this->assertEquals(0, $sumResult);
    }

    public function testOneNumberStringReturnsItsValue()
    {
        $sumResult = $this->stringCalculator->add("1");

        $this->assertEquals(1, $sumResult);
    }

    public function testMoreThanOneNumberStringReturnsTheSum()
    {
        $sumResult = $this->stringCalculator->add("1,2,3");

        $this->assertEquals(6, $sumResult);
    }

    public function testAddEnduresLineBreakAndCommaAsDelimiterInNumbersString()
    {
        $sumResult = $this->stringCalculator->add("1\n2,3");

        $this->assertEquals(6, $sumResult);
    }

    public function testAddEnduresDifferentSpecifiedDelimitersInNumbersString()
    {
        $sumResult = $this->stringCalculator->add("//;\n1;2;3");

        $this->assertEquals(6, $sumResult);
    }

    public function testAddDoesntEnduresNegativeNumbers()
    {
        $sumResult = $this->stringCalculator->add("//;\n-1;2;-3");

        $this->assertEquals(-1, $sumResult);
    }

    public function testNumbersBiggerThan1000Ignored()
    {
        $sumResult = $this->stringCalculator->add("//;\n1005;2;3");

        $this->assertEquals(5, $sumResult);
    }

    public function testAddEnduresSpecifiedDelimiterInNumbersStringBetweenSquareBrakets()
    {
        $sumResult = $this->stringCalculator->add("//[*,;]\n1*,;2*,;3");

        $this->assertEquals(6, $sumResult);
    }
}
