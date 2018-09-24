<?php

namespace App;

class Article extends Model
{
	use \Dimsav\Translatable\Translatable;
		
    public $translatedAttributes = ['title', 'body'];
	
	// protected $guarded = [];

	// public $translationModel = 'App\ArticleTranslation';
    // public $translatedAttributes = ['title','body'];
    // protected $fillable = ['category_id'];
    
	public function categories()
	{
		return $this->belongsTo('App\Category','category_id');
	}

}


