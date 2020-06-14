<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perritos extends Model
{
    protected $table = 'perritos';
    protected $fillable = ['raza','sexo','nombre','tamano', 'fecha_nacimiento','senas_particulares','foto'];
    protected $hidden = ['created_at','updated_at'];
    function getRaza(){
        return  $this->belongsTo(Raza::class,'raza_id');
    }
    function getSexo(){
        return $this->belongsTo(Sexo::class,'sexo_id');
    }
    function getTamano(){
        return $this->belongsTo(Tamano::class,'tamano_id');
    }
}
