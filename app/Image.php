<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = "images";
    protected $fillable = ['name','id_category','path','estatus'];
    
    public function Article(){
    	return $this->hasMany("App\Article");
    }
    //Relacion con estatus
    public function Estatus(){
    	return $this->belongsTo("App\Estatus");
    }
    //Relacion con CategoryImg
    public function CategoryImg(){
    	return $this->belongsTo("App\CategoryImg");
    }
}
