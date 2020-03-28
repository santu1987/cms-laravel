<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
    protected $table = "idioma";

    protected $fillable = ['description'];
 	/*--- Cuerpo de relaciones ---*/
    public function Empresa(){
    	return $this->hasMany("App\Empresa");
    }
}
