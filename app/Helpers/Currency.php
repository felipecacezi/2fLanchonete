<?php

namespace App\Helpers;

class Currency
{
     /**
     * Converts a given value in Brazilian Reais (BRL) to cents.
     *
     * @param float $valueInReal the value in BRL to be converted
     * @return int the value in cents
     */
    public static function convertRealToCents(string $valueInReal): int {
        $valueInReal = str_replace(',', '', $valueInReal);
        return (int)$valueInReal * 100;
    }

     /**
     * Converts a given value in Brazilian cents (BRL) to reals.
     *
     * @param int $valueInCents the value in BRL to be converted
     * @return int the value in cents
     */
    public static function convertCentsToReal(int $valueInCents): string {
        $valueInReal = ($valueInCents / 100);
        $valueInReal = substr_replace($valueInReal, ',', -2, 0);
        return $valueInReal;
    }
}