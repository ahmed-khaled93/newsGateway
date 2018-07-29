<?php

namespace App;


class Album extends Model
{
    
	public function photos()
    {

        return $this->hasMany('App\Photo');

    }


    public static function albums()
	{

		return static::all();

	}


}
