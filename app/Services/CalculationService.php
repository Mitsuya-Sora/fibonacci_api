<?php

namespace App\Services;

use Symfony\Component\HttpFoundation\Response;

class CalculationService
{
    
    public function isNaturalNumber($number)
    {
        $isNotString = is_numeric($number);
        $isNotFloat = $number == intval($number);
        $isPlus = $number > 0;

        if ($isNotString && $isNotFloat && $isPlus){
            return true;
        }else{
            return false;
        }
    }

    public function getFibonacci($nth)
    {
        $fibonacciNums = [];
        for ($i = 0; $i <= $nth; $i++) {
            if ($i == 0 || $i == 1) {
                $fibonacciNums[$i] = $i;
            } else {
                $fibonacciNums[$i] = $fibonacciNums[$i - 1] + $fibonacciNums[$i - 2];
            }
        }
        return $fibonacciNums[$nth];
    }

}