<?php

declare(strict_types=1);

namespace Deg540\StringCalculatorPHP\Test;

use Deg540\StringCalculatorPHP\StringCalculator;
use PHPUnit\Framework\TestCase;

final class StringCalculatorTest extends TestCase
{
    // TODO: String Calculator Kata Tests
    public function test_0_if_string_empty()
    {
        $stringCalculator = new StringCalculator();

        $sumResult = $stringCalculator->add("");

        $this->assertEquals(0, $sumResult);
    }

    public function test_one_number_string_returns_its_value()
    {
        $stringCalculator = new StringCalculator();

        $sumResult = $stringCalculator->add("1");

        $this->assertEquals(1, $sumResult);
    }

    public function test_more_than_one_number_string_returns_the_sum()
    {
        $stringCalculator = new StringCalculator();

        $sumResult = $stringCalculator->add("1,2,3");

        $this->assertEquals(6, $sumResult);
    }

    public function test_add_endures_line_break_and_comma_as_delimiter_in_numbers_string()
    {
        $stringCalculator = new StringCalculator();

        $sumResult = $stringCalculator->add("1\n2,3");

        $this->assertEquals(6, $sumResult);
    }

    public function test_add_endures_different_specified_delimiters_in_numbers_string()
    {
        $stringCalculator = new StringCalculator();

        $sumResult = $stringCalculator->add("//;\n1;2;3");

        $this->assertEquals(6, $sumResult);
    }

    public function test_add_doesnt_endures_negative_numbers()
    {
        $stringCalculator = new StringCalculator();

        $sumResult = $stringCalculator->add("//;\n-1;2;-3");

        $this->assertEquals(-1, $sumResult);
    }
}