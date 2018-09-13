<?php

namespace App;


class OauthClient extends Model
{
    
	public function user()
	{

		return $this->belongsTo('App\User', 'user_id');

	}
    
}
