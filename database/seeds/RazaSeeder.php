<?php

use Illuminate\Database\Seeder;

class RazaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Raza::create([
            'raza' => 'American Bully',
            'descripcion' => 'El american bully es un perro que proviene de EEUU, se trata de una mezcla entre american pit bull terrier y american staffordshire terrier y cuenta además con parientes más lejanos como el bulldog inglés y staffordshire bull terrier.'
        ]);

        \App\Models\Raza::create([
            'raza' => 'Shorkie',
            'descripcion' => 'Se trata de un perro mestizo surgido del cruce entre un shih yzu y un yorkshire terrier, lo que da como resultado un perrito de tamaño toy, con un carácter que es de todo menos pequeño.'
        ]);

        \App\Models\Raza::create([
            'raza' => 'Pincher Aleman',
            'descripcion' => 'El pinscher alemán es un animal realmente inteligente, vivaz y muy muy intrépido.'
        ]);

        \App\Models\Raza::create([
            'raza' => 'Border Collie',
            'descripcion' => 'El border collie es una raza canina que destaca por poseer una amplia capacidad de aprendizaje en distintos ámbitos: obediencia canina básica, avanzada, habilidades caninas, pastoreo o Agility entre otros.'
        ]);

        \App\Models\Raza::create([
            'raza' => 'Bóxer ',
            'descripcion' => 'Es una de las razas caninas de tipo moloso más populares del mundo y nace del cruce entre un Brabant bullenbeisser y un Bulldog, razas extintas actualmente.'
        ]);
    }
}
