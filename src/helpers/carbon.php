<?php

use Illuminate\Support\Carbon;

if (!function_exists('carbon')) {
    function carbon(...$args)
    {
        return new Carbon(...$args);
    }
}
