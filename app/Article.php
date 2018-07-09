<?php

namespace App;



class Article extends Model
{
    
	public function catgs()
	{

		return $this->belongsTo('App\Catg','catg_id');

	}

}
