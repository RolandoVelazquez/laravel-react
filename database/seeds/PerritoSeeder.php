<?php

use Illuminate\Database\Seeder;

class PerritoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Perritos::create([
           'raza_id'=>1,
           'sexo_id'=>2,
           'nombre'=>'Pablo',
           'tamano_id'=>1,
           'fecha_nacimiento'=>'2020-04-10',
           'senas_particulares'=>null,
           'foto'=>'foto-perro-1.jpg'
        ]);
        \App\Models\Perritos::create([
           'raza_id'=>2,
           'sexo_id'=>1,
           'nombre'=>'Pedro',
           'tamano_id'=>1,
           'fecha_nacimiento'=>'2018-04-09',
           'senas_particulares'=>null,
           'foto'=>'foto-perro-2.jpg'
        ]);
        \App\Models\Perritos::create([
           'raza_id'=>3,
           'sexo_id'=>1,
           'nombre'=>'Ewin',
           'tamano_id'=>2,
           'fecha_nacimiento'=>'2016-04-12',
           'senas_particulares'=>null,
           'foto'=>'foto-perro-3.jpg'
        ]);
        \App\Models\Perritos::create([
           'raza_id'=>4,
           'sexo_id'=>1,
           'nombre'=>'Rola',
           'tamano_id'=>2,
           'fecha_nacimiento'=>'2017-04-10',
           'senas_particulares'=>null,
           'foto'=>'foto-perro-4.jpg'
        ]);
        \App\Models\Perritos::create([
           'raza_id'=>5,
           'sexo_id'=>2,
           'nombre'=>'Fra',
           'tamano_id'=>2,
           'fecha_nacimiento'=>'2015-11-11',
           'senas_particulares'=>null,
           'foto'=>'foto-perro-5.jpg'
        ]);
        \App\Models\Perritos::create([
           'raza_id'=>2,
           'sexo_id'=>1,
           'nombre'=>'Lucas',
           'tamano_id'=>3,
           'fecha_nacimiento'=>'2014-04-10',
           'senas_particulares'=>null,
           'foto'=>'foto-perro-6.jpg'
        ]);
        \App\Models\Perritos::create([
           'raza_id'=>3,
           'sexo_id'=>1,
           'nombre'=>'Ayudante de santa',
           'tamano_id'=>3,
           'fecha_nacimiento'=>'2016-04-01',
           'senas_particulares'=>null,
           'foto'=>'foto-perro-7.jpg'
        ]);
        \App\Models\Perritos::create([
           'raza_id'=>5,
           'sexo_id'=>2,
           'nombre'=> 'Carmen',
           'tamano_id'=>1,
           'fecha_nacimiento'=>'2015-04-02',
           'senas_particulares'=>null,
           'foto'=>'foto-perro-8.jpg'
        ]);
    }
}
