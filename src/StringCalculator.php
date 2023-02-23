<?php

namespace Deg540\StringCalculatorPHP;

use Exception;
use function PHPUnit\Framework\throwException;

class StringCalculator
{
    // TODO: String Calculator Kata
    public function add(string $numbers_to_add): int{
        if(empty($numbers_to_add)){
            return 0;
        }

        try{
            if(!$this->contains_negative_numbers($numbers_to_add)){
                if(is_numeric($numbers_to_add)){
                    if((int)$numbers_to_add>1000){
                        return 0;
                    }
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
                    if((int)$separated_numbers[$number_position]<=1000){
                        $numbers_sum += (int)$separated_numbers[$number_position];
                    }
                }
                return $numbers_sum;
            }
            throw new Exception("Negativos no soportados: ");
        } catch (Exception $e){
            echo $e->getMessage().$this->negatives_in_chain($numbers_to_add);
            return -1;
        }
    }

    public function specifies_delimiter(string $chain): bool
    {
        return str_contains($chain, "//");
    }

    public function negatives_in_chain(string $chain): string
    {
        preg_match_all("/-./i", $chain, $negative_numbers);
        return implode(", ", $negative_numbers[0]);
    }

    public function contains_negative_numbers(string $chain): bool
    {
        return str_contains($chain, "-");
    }
}