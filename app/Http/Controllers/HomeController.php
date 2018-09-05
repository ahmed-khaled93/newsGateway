<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catg;
use App\Album;
use App\Photo;
use App\Article;
use App\Urgent;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request->user()->authorizeRoles(['User', 'Admin']));
            $catgs = Catg::catgs();
            $photos = Photo::orderBy('id', 'desc')->take(8)->get();
            $articles = Article::orderBy('id', 'desc')->take(4)->get();
            $urgent = Urgent::latest()->get();
            
            return view('frontend.index', compact('photos', 'articles', 'urgent'));
    }


    public function dashboard(Request $request)
    {
        // dd('hjgkgdasfhia');
        if($request->user()->authorizeRoles(['Admin','Author']))
        {
            $categories = Catg::categories();
            $albums = Album::albums();
            return view('backend.index');
        }
        else
        {
            return view('frontend.access.auth.login');
        }

    }

}
