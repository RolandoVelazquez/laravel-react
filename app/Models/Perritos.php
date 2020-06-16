<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Perritos extends Model
{
    use SoftDeletes;
    protected $table = 'perritos';
    protected $fillable = ['raza_id','sexo_id','nombre','tamano_id', 'fecha_nacimiento','senas_particulares','foto'];
    protected $hidden = ['deleted_at','created_at','updated_at'];
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
