<?php

use Illuminate\Support\Str;

if (! function_exists('str_match')) {
    function str_match($string, $pattern)
    {
        return Str::match($string, $pattern);
    }
}