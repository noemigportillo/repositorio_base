<?php

declare(strict_types=1);

namespace Deg540\StringCalculatorPHP\Test;

use Deg540\StringCalculatorPHP\StringCalculator;
use PHPUnit\Framework\TestCase;

final class StringCalculatorTest extends TestCase
{
    // TODO: String Calculator Kata Tests
    public function tesT0IfStringEmpty()
    {
        $stringCalculator = new StringCalculator();

        $sumResult = $stringCalculator->add("");

        $this->assertEquals(0, $sumResult);
    }

    public function testOneNumberStringReturnsItsValue()
    {
        $stringCalculator = new StringCalculator();

        $sumResult = $stringCalculator->add("1");

        $this->assertEquals(1, $sumResult);
    }

    public function testMoreThanOneNumberStringReturnsTheSum()
    {
        $stringCalculator = new StringCalculator();

        $sumResult = $stringCalculator->add("1,2,3");

        $this->assertEquals(6, $sumResult);
    }

    public function testAddEnduresLineBreakAndCommaAsDelimiterInNumbersString()
    {
        $stringCalculator = new StringCalculator();

        $sumResult = $stringCalculator->add("1\n2,3");

        $this->assertEquals(6, $sumResult);
    }

    public function testAddEnduresDifferentSpecifiedDelimitersInNumbersString()
    {
        $stringCalculator = new StringCalculator();

        $sumResult = $stringCalculator->add("//;\n1;2;3");

        $this->assertEquals(6, $sumResult);
    }

    public function testAddDoesntEnduresNegativeNumbers()
    {
        $stringCalculator = new StringCalculator();

        $sumResult = $stringCalculator->add("//;\n-1;2;-3");

        $this->assertEquals(-1, $sumResult);
    }

    public function testNumbersBiggerThan1000Ignored()
    {
        $stringCalculator = new StringCalculator();

        $sumResult = $stringCalculator->add("//;\n1005;2;3");

        $this->assertEquals(5, $sumResult);
    }

    public function testAddEnduresSpecifiedDelimiterInNumbersStringBetweenSquareBrakets()
    {
        $stringCalculator = new StringCalculator();

        $sumResult = $stringCalculator->add("//[*,;]\n1*,;2*,;3");

        $this->assertEquals(6, $sumResult);
    }
}
