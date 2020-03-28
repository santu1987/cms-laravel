<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estatus extends Model
{
    protected $table = "estatus";

    protected $fillable = ['description'];

    public function User(){
    	return $this->hasMany("App\User");
    }
    public function Category(){
    	return $this->hasMany("App\Category");
    }
    public function Tag(){
    	return $this->hasMany("App\Tag");
    }
    public function Article(){
        return $this->hasMany("App\Article");
    }
    public function Image(){
        return $this->hasMany("App\Article");
    }
}
