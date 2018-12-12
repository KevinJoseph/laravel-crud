<?php

use Faker\Generator as Faker;

$factory->define(App\Package::class, function (Faker $faker) {
    return [
            
         'type_service' => 'Cargo',
         'client_id' => $faker->randomDigit,
         'consigned_dni'=> $faker->randomDigit,
         'consigned_name' => $faker->name,
         'office_origin'=> $faker->randomDigit,
         'office_destination'=> $faker->randomDigit,
         'type_pay' => 'Cancelado',
         'price' => $faker->randomDigit,
    ];
});
