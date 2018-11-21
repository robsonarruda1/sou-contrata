<?php
use App\Vacancy;
use App\Edict;
use Faker\Generator as Faker;

$factory->define(Vacancy::class, function ($faker) use ($factory) {
    return [
        'title' => $faker->title,
        'payload' => $faker->numberBetween(20,60),
        'phone' => $faker->phoneNumber,
        'postal_code' => $faker->postcode,
        'matter' => $faker->text(40),
    ];
});

