<?php

use Illuminate\Support\Str;

if (! function_exists('str_wrap')) {
    function str_wrap($value, $cap)
    {
        return Str::wrap($value, $cap);
    }
}