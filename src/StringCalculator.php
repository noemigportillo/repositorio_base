<?php

namespace Deg540\StringCalculatorPHP;

class StringCalculator
{
    // TODO: String Calculator Kata
    public function add(string $numbers_to_add): int{
        if(empty($numbers_to_add)){
            return 0;
        }

        if(str_contains($numbers_to_add, "\n") || str_contains($numbers_to_add, ",")){
            $delimiters = [",", "\n"];
            $unified_numbers_to_add = str_replace($delimiters, $delimiters[0], $numbers_to_add);
            $numbers_sum = 0;
            $separated_numbers = explode($delimiters[0], $unified_numbers_to_add);
            for($number_position = 0; $number_position < count($separated_numbers); $number_position++){
                $numbers_sum += (int)$separated_numbers[$number_position];
            }
            return $numbers_sum;
        }

        return (int)$numbers_to_add;
    }
}