<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tamano extends Model
{
    protected $table = 'tamano';
    protected $fillable = ['tamano', 'descripcion'];
    protected $hidden = ['created_at','updated_at'];
    function getPerritos(){
        return $this->hasMany(Perritos::class);
    }
}
