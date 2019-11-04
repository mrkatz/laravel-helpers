<?php

use Faker\Factory;

if (!function_exists('faker')) {
    function faker($property = null)
    {
        $faker = Factory::create();

        return $property ? $faker->{$property} : $faker;
    }
}