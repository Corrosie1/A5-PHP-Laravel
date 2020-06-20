<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Epk;
use Faker\Generator as Faker;

$factory->define(epk::class, function (Faker $faker) {
    return [
      'titel' => $faker->title,
      'biografie' => $faker->text,
      'category' => $faker->word,
      'epk_id' => $faker->randomDigit,
    ];
});
