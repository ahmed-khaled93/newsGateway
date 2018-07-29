<?php

namespace App;


class Photo extends Model
{
    
	public function album()
	{

		return $this->belongsTo('App\Album', 'album_id');

	}


}
