<?php
if (! function_exists('swap')) {
    function swap(&$a, &$b)
    {
        $temp = $a;
        $a    = $b;
        $b    = $temp;
    }
}