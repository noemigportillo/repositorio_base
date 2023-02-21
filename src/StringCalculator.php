<?php

namespace Deg540\StringCalculatorPHP;

class StringCalculator
{
    // TODO: String Calculator Kata
    public function add(string $numbers_to_add): int{
        if(empty($numbers_to_add)){
            return 0;
        }

        if(is_numeric($numbers_to_add)){
            return (int)$numbers_to_add;
        }

        if($this->specifies_delimiter($numbers_to_add)){
            $delimiters = [substr($numbers_to_add, 2, 1)];
            $separated_numbers = explode($delimiters[0], $numbers_to_add);
        }
        else{
            $delimiters = [",", "\n"];
            $unified_numbers_to_add = str_replace($delimiters, $delimiters[0], $numbers_to_add);
            $separated_numbers = explode($delimiters[0], $unified_numbers_to_add);
        }

        $numbers_sum = 0;
        for($number_position = 0; $number_position < count($separated_numbers); $number_position++){
            $numbers_sum += (int)$separated_numbers[$number_position];
        }
        return $numbers_sum;
    }

    public function specifies_delimiter(string $chain): bool
    {
        return str_contains($chain, "//");
    }
}