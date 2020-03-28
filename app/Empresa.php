<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = "empresa";

    protected $fillable = ['id','objetivo','mision','vision','id_imagen','id_idioma','estatus'];
    /*--- Cuerpo de relaciones ---*/
    //Relacion con estatus one to many
    public function Idioma(){
        return $this->belongsTo("App\Idioma");
    }
    //Relacion con Images one to many
    public function images(){
        return $this->belongsTo("App\Images");
    }
    //Relacion con Estatus one to many
    public function estatus(){
        return $this->belongsTo("App\Estatus");
    }
    
}
