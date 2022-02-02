<?php

use Illuminate\Support\Str;

if (!function_exists('currency_IDR')) {
    function currency_IDR($value)
    {
        return number_format($value, 0, ",", ".");
    }
}

function deleteDots($value){
    return str_replace(".", "", $value);
}

function deleteComma($value){
    return str_replace(",", "", $value);
}
