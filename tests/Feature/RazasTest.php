<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RazasTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_post_tamano(){//Post
        //$this->withoutExceptionHandling(); //Unicamente para ver que errores tengo
       $response = $this->post(route('api.agregar.tamano'),[
           'tamano'=>'mediochico',
           'descripcion'=>'nada'
       ]);

       $this->assertDatabaseHas('tamano', [
           'tamano'=>'mediochico',
       ]);
    }

    public function test_edit_tamano(){ //patch
        $response = $this->post(route('api.agregar.tamano'),[
            'tamano'=>'mediochico',
            'descripcion'=>'nada'
        ]);

        $response = $this->patch(route('api.edit.tamano'),[
            'id'=>1,
            'tamano'=>'mediochi',
            'descripcion'=>'nada'
        ]);

        $this->assertDatabaseHas('tamano', [
            'tamano'=>'mediochi',
        ]);
    }

    public function test_delete_tamano(){//delete

        $response = $this->post(route('api.agregar.tamano'),[
            'tamano'=>'mediochico',
            'descripcion'=>'nada'
        ]);

        $response = $this->delete(route('api.delete.tamano',['id'=>1]));

        $this->assertDatabaseMissing('tamano',[
            'id'=>1
        ]);
    }


}
