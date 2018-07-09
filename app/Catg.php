<?php

namespace App;




class Catg extends Model
{

	public function articles()
    {

        return $this->hasMany('App\Article');

    }

    
	public static function catgs()
	{

		return static::all();

	}


	public static function categories()
	{

		return static::all();

	}

}
