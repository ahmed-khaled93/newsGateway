<?php

namespace App;


class Role extends Model
{
    
	public function users()
	{

		// return belongsToMany(User::class);
		return $this->belongsToMany('App\User');

	}


}
