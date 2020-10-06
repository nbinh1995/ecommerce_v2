<?php


if (!function_exists('showCurrencyRight')) {
    function showCurrency(string $currency, float $money): string
    {
        return number_format($money, 0, ',', ',') . ' ' . $currency;
    }
}
