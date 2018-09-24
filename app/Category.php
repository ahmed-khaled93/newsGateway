<?php

namespace App;

class Category extends Model
{
	use \Dimsav\Translatable\Translatable;

	protected $guarded = [];

	public $translationModel = 'App\CategoryTranslation';
	public $translatedAttributes = ['title'];
    // protected $fillable = ['image'];

	public function articles()
    {
        return $this->hasMany('App\Article');
    }

    
	public static function categories()
	{
		return static::all();
	}


	// public static function categories()
	// {
	// 	return static::all();
	// }

}
