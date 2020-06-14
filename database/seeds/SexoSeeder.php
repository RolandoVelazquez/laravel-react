<?php

use Illuminate\Database\Seeder;

class SexoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Sexo::create([
           'sexo'=>'Macho',
           'descripcion'=>'Es un perrito'
        ]);

        \App\Models\Sexo::create([
           'sexo'=>'Hembra',
           'descripcion'=>'Es una perrita'
        ]);
    }
}
