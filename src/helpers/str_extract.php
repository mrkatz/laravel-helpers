<?php

use Illuminate\Support\Str;
if (! function_exists('str_extract')) {
    function str_extract($string, $pattern)
    {
        return Str::extract($string, $pattern);
    }
}