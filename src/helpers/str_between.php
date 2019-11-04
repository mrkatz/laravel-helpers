<?php

use Illuminate\Support\Str;

if (!function_exists('str_between')) {
    function str_between($subject, $beginning, $end = null)
    {
        return Str::between($subject, $beginning, $end);
    }
}