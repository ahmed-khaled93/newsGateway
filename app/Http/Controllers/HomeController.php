<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Album;
use App\Photo;
use App\Article;
use App\Urgent;
use App;

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
        $categories = Category::all();
        // dd(App::getLocale());
        // $translate = Article::translated()->get();
        // dd($categories);
        $photos = Photo::orderBy('id', 'desc')->take(8)->get();
        // $article = Article::first();
        $articles = Article::orderBy('id', 'desc')->take(5)->get();
        // dd($articles);
        $hotnews  = Article::orderBy('id','desc')->take(4)->get();  
        $urgent = Urgent::latest()->get();
        
        return view('frontend.index', compact('photos', 'articles', 'urgent', 'hotnews', 'categories', 'locale'));       
    }


    // public function localization(Request $request, $locale)
    // {

    //     // App::setLocale($locale);
    //     // $locale = App::getLocale();

    //     // if (App::isLocale('en')) 
    //     // { 
    //     \Session::put('locale', $locale);
    //         $categories = Category::categories();
    //         $photos = Photo::orderBy('id', 'desc')->take(8)->get();
    //         $articles = Article::orderBy('id', 'desc')->take(5)->get();
    //         $hotnews  = Article::orderBy('id','desc')->skip(5)->take(4)->get();  
    //         $urgent = Urgent::latest()->get();
            
    //         return view('frontend.index', compact('photos', 'articles', 'urgent', 'hotnews','locale'));
        
    //     // }elseif (App::isLocale('ar')) 
    //     // {
    //     //     $categories = Category::categories();
    //     //     $photos = Photo::orderBy('id', 'desc')->take(8)->get();
    //     //     $articles = Article::orderBy('id', 'desc')->take(5)->get();
    //     //     $hotnews  = Article::orderBy('id','desc')->skip(5)->take(4)->get();  
    //     //     $urgent = Urgent::latest()->get();
            
    //     //     return view('frontend.index', compact('photos', 'articles', 'urgent', 'hotnews','locale'));
    //     // }
            
    // }


    public function dashboard(Request $request)
    {
        // dd('hjgkgdasfhia');
        if($request->user()->authorizeRoles(['Admin','Author']))
        {
            $categories = Category::categories();
            $albums = Album::albums();
            return view('backend.index');
        }
        else
        {
            return view('frontend.access.auth.login');
        }

    }

}
