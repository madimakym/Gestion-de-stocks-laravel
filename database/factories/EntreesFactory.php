<?php

use Faker\Generator as Faker;

$factory->define(App\Entrees::class, function (Faker $faker) {
    return [
        'libelle' => $faker->text(20),
        'description' => $faker->text(20),
        'prix' => $faker->unique()->numberBetween($min = 5000, $max = 9000),
        'category_id' => $faker->unique()->numberBetween($min = 5000, $max = 9000)
    ];
});
