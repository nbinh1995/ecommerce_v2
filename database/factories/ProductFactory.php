<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'category_id' => rand(1, 3),
        'name' => $title = 'Product ' . Str::random(15),
        'meta_title' => $title,
        'slug' => Str::slug($title),
        'description' => $faker->paragraph(5),
        'price' => rand(400000, 1500000),
        'is_new' => rand(0, 1),
    ];
});
