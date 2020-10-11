<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

use App\Models\backend\product;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(product::class, function (Faker $faker) {
    $title = $faker->name;
    return [
        'id' =>rand(),
        'product_title'=>$title,
        'product_description' => $faker->paragraph(),
        'slug' =>Str::slug($title),
        'stockAmount' => rand(1,10),
        'stock' =>1,
        'Price' =>rand(1000,1400),
        'offerPrice' =>rand(899,999),
        'status' =>1,
        'category_id' =>rand(1,2),
        'brand_id' =>rand(1,2),

    ];
});