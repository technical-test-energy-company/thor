<?php

if (! function_exists('fakeCve')) {
    function fakeCve(): string
    {
        $year = fake()->numberBetween(1999, now()->year);
        $id = fake()->numberBetween(1000, 90000);

        return "CVE-$year-$id";
    }
}

if (! function_exists('fakeRiskScore')) {
    function fakeRiskScore(): float
    {
        return number_format((fake()->numberBetween(0, 100) / 100), 2);
    }
}
