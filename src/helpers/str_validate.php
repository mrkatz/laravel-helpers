<?php

use Illuminate\Support\Str;

if (! function_exists('validate')) {
    function str_validate($data, $rules)
    {
        return Str::validate($data, $rules);
    }
}