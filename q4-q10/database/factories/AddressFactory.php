<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Domain\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'number' => $faker->numberBetween(1,1000),
        'street' => $faker->streetName,
        'complement' => 'complement',
        'district' => 'district',
        'city' => $faker->city,
        'state' => $faker->state,
        'zipCode' => $faker->postcode
    ];
});
