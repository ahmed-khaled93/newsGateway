<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventHistory;

class EventHistoryController extends Controller
{
    
	public function eventsHistory()
	{

		$history = EventHistory::all();

		return view('backend.events.articleEvents',compact('history'));

	}

}
