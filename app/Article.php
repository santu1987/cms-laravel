<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Article extends Model
{
    use Sluggable;

    protected $table = "articles";

    protected $fillable = ['title','content','category_id','user_id','estatus_id','id_imagen'];
    
    public function Category(){
    	return $this->belongsTo("App\Category");
    }
    public function User(){
    	return $this->belongsTo("App\User");
    }
    public function Image(){
    	return $this->belongsTo("App\Image");
    }
    public function Tag(){
    	return $this->belongsToMany("App\Tag");
    }
    //Relacion con estatus one to many
    public function Estatus(){
        return $this->belongsTo("App\Estatus");
    }
    public function sluggable(){
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
