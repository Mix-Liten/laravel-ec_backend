<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Category;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    static $number = 1;
    return [
        'name' => $faker->unique()->name,
        'sort_no' => $number++,
    ];
});
