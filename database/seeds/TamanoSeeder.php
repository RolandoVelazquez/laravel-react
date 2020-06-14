<?php

use Illuminate\Database\Seeder;

class TamanoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Tamano::create([
           'tamano'=>'Pequeño',
           'descripcion'=>'Ta chiquito'
        ]);

        \App\Models\Tamano::create([
           'tamano'=>'Mediano',
           'descripcion'=>'Casi chiquito'
        ]);

        \App\Models\Tamano::create([
           'tamano'=>'Grande',
           'descripcion'=>'No ta chiquito'
        ]);
    }
}
