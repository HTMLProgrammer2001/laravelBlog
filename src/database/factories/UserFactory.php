<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\Category;
use App\Tag;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'content' => $faker->sentence,
        'image' => '5qyvzkiJMR.jpeg',
        'date' => '08/09/17', // password
        'views' => $faker->numberBetween(0, 5000),
        'category_id' => 1,
        'user_id' => 1,
        'status' => 1,
        'is_featured' => 0
    ];
});

$factory->define(Category::class, function (Faker $faker) {
    return [
        'title' => $faker->word
    ];
});

$factory->define(Tag::class, function (Faker $faker) {
    return [
        'title' => $faker->word
    ];
});
