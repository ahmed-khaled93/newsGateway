<?php

namespace App;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Article extends Eloquent
{
    use \Dimsav\Translatable\Translatable;
	// use Translatable;

    // public $translationModel = 'App\ArticleTranslation';
    public $translatedAttributes = ['title','body'];
    
    
	public function catgs()
	{

		return $this->belongsTo('App\Category','category_id');

	}

}
