<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryImg extends Model
{
    //
    protected $table = "categories_img";

	protected $fillable = ["content"];

	//Relacion con Image
    public function Image(){
    	return $this->hasMany("App\Image");
    }
}
