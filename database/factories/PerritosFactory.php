<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Perritos;
use Faker\Generator as Faker;

$factory->define(Perritos::class, function (Faker $faker) {
    return [
        'raza_id'=>$faker->numberBetween(1,3),
        'sexo_id'=>$faker->numberBetween(1,2),
        'nombre'=> 'Tequilaa',
        'tamano_id'=>$faker->numberBetween(1,3),
        'fecha_nacimiento'=>$faker->date(),
        'senas_particulares'=>null,
    ];
});
