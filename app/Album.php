<?php

namespace App;


class Album extends Model
{
	use \Dimsav\Translatable\Translatable;

	public $translationModel = 'App\AlbumTranslation';
	public $translatedAttributes = ['title'];
    
	public function photos()
    {

        return $this->hasMany('App\Photo');

    }


    public static function albums()
	{

		return static::all();

	}


}
