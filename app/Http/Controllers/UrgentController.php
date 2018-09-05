<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UrgentRepository;
use App\Http\Requests\Backend\UrgentNews\urgentNewsRequest;
use App\Http\Requests\Backend\UrgentNews\updateUrgentNewsRequest;
use App\Urgent;

class UrgentController extends Controller
{
	protected $urgentRepository;

	public function __construct(UrgentRepository $urgentRepository)
    {
        $this->urgentRepository = $urgentRepository;
    }
    
// ========================================================================
// Front End ==========================================================
	public function urgentnews()
	{
		$urgents = $this->urgentRepository->urgentnews();
		return view('backend.articles.urgentnews', compact('urgents'));
	}

// BackEnd ============================================================

	public function newUrgentNews(urgentNewsRequest $request)
	{
		$newUrgent = $this->urgentRepository->newUrgentNews($request);
		return redirect('/dashboard/urgentnews');
	}

	public function deleteurgentnews(Request $request)
	{
		$delete = $this->urgentRepository->deleteUrgentNews($request);
		return back();
	}

	public function updateUrgentNews(updateUrgentNewsRequest $request)
	{
		$update = $this->urgentRepository->updateUrgentNews($request);
		return view('backend.articles.urgentnews');
	}

}
