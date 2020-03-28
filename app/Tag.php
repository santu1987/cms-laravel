<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = "tags";
    protected $fillable = ['name','estatus_id'];
    //Relacion con articles BelongsToMany
    public function Article(){
    	return $this->belongsToMany("App\Article")->withTimestamps();
    }
    //Relacion con estatus one to many
    public function estatus(){
        return $this->belongsTo("App\Estatus");
    }
}