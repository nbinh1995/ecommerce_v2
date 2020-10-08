<?php

if (!function_exists('showCurrency')) {
    function showCurrency(string $currency, float $money): string
    {
        return number_format($money, 0, ',', ',') . ' ' . $currency;
    }
}
