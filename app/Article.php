<?php

namespace App;

    
class Article extends Model
{
 	
 	use \Dimsav\Translatable\Translatable;

	public $translatedAttributes = ['title','body'];
    protected $fillable = ['image'];
    
	public function catgs()
	{

		return $this->belongsTo('App\Catg','catg_id');

	}

}
