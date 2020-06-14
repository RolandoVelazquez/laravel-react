<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perritos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('raza_id')->references('id')->on('raza');
            $table->foreignId('sexo_id')->references('id')->on('sexo');
            $table->string('nombre');
            $table->foreignId('tamano_id')->references('id')->on('tamano');
            $table->date('fecha_nacimiento');
            $table->string('senas_particulares')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perritos');
    }
}
