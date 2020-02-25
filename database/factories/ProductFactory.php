<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Product;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
        'category_id' => $faker->numberBetween(1, 10),
        'price' => $faker->numberBetween(49, 10000),
        'qty' => $faker->numberBetween(0, 50),
        'description' => $faker->text($maxNbChars = 50),
        'content' => $faker->text($maxNbChars = 200),
        'image' => $faker->imageUrl($width = 640, $height = 480),
    ];
});
