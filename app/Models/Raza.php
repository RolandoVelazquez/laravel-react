<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Raza extends Model
{
    protected $table = 'raza';
    protected $fillable = ['raza','descripcion'];
    protected $hidden = ['created_at','updated_at'];

    function getPerritos(){
        return $this->hasMany(Perritos::class);
    }

}
