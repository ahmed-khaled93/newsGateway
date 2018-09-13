<?php

namespace App;


class EventHistory extends Model
{
	
    public function user()
	{
		return $this->belongsTo('App\User', 'user_id');
	}


}
