<?php
if (!function_exists('user')) {
    function user($guard = null)
    {
        return auth($guard)->user();
    }
}