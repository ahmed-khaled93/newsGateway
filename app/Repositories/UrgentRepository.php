<?php

namespace App\Repositories;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Backend\UrgentNews\urgentNewsRequest;
use App\Http\Requests\Backend\UrgentNews\updateUrgentNewsRequest;
use App\Urgent;


class UrgentRepository
{
	public function urgentnews()
	{

		$urgents = Urgent::all();
		return $urgents;

	}

	public function newUrgentNews(urgentNewsRequest $request)
	{
		// dd($request->news);
		// $newUrgent = new Urgent(request(['news']));

		$newUrgent = new Urgent();
		$newUrgent->news = $request->input('news');
    	
    	$newUrgent->save();

	}

	public function updateUrgentNews(updateUrgentNewsRequest $request)
	{
		// dd($request->hdnId);
		$update = Urgent::find($request->hdnId);
		$update->update(request(['news']));
		$update->save();
	}

	public function deleteUrgentNews(Request $request)
	{
		//dd($request->hdnDeleteId);
		$delete = Urgent::find($request->hdnDeleteId);
		$delete->delete();
	}

}