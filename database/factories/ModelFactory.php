<?php

use Faker\Generator as Faker;

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

// $factory->define(App\User::class, function (Faker $faker) {
//     static $password;
//
//     return [
//         'name' => $faker->name,
//         'email' => $faker->unique()->safeEmail,
//         'password' => $password ?: $password = bcrypt('secret'),
//         'remember_token' => str_random(10),
//     ];
// });

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Model\User\post::class, function (Faker $faker) {
  $gender = $faker->randomElement(['male', 'female']);
    return [
        'title' => $faker->sentence(3),
        'subtitle' => $faker->sentence(4),
        'slug' => $faker->slug(),
        'body' => $faker->paragraph(),
        'status' => $faker->randomElement(['on', null]),
        'posted_by' => $faker->randomDigit(),
        'image' => $faker->imageUrl(640, 480, 'nature'),
        'like' => $faker->randomElement([1, 0]),
        'dislike' => $faker->randomElement([1, 0])
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Model\User\category::class, function (Faker $faker) {
    $gender = $faker->randomElement(['male', 'female']);
    return [
        'name' => $faker->name($gender),
        'slug' => $faker->slug()
    ];
});
