<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ArticleRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\UrgentRepository;
use App\Http\Requests\Backend\Articles\StoreAndUpdateArticleRequest;
use App\Http\Requests\Backend\UrgentNews\urgentNewsRequest;
use App\Article;
use App\Category;
use App\Events\CreateArticle;

class ArticleController extends Controller
{

	protected $articleRepository;
	protected $categoryRepository;
	

	public function __construct(ArticleRepository $articleRepository, CategoryRepository $categoryRepository, UrgentRepository $urgentRepository)
    {
        $this->articleRepository = $articleRepository;
        $this->categoryRepository = $categoryRepository;
        $this->urgentRepository = $urgentRepository;
    }

// ============================ Front End ====================================	

	public function articles($catName, CategoryRepository $CategoryRepository)
	{
		$articles = $CategoryRepository->getArticleByName($catName);
		return view ('frontend.articles.categories',compact('articles'));
	}
    

	public function show($id)
	{
		$article = $this->articleRepository->showArticle($id);
		return view('frontend.articles.show' , compact('article'));
	}


	//Start BackEnd actions
	//By: Ahmad Khaled
	//Date: 29/7/2018

	public function dashboardArticles($id)
	{
		$articles = $this->articleRepository->getArticleById($id);
		$categories = $this->categoryRepository->getAllCategories();
		$menuArticles = ['articles', 'category_id'];

		return view('backend.articles.articles',compact('articles', 'menuArticles', 'categories') );
		return session('message');
	}


	public function create(CategoryRepository $CategoryRepository)
	{
		$categories = $CategoryRepository->getAllCategories();
		return view('backend.articles.create', compact('categories'));
	}


	public function store(StoreAndUpdateArticleRequest $request)
	{

		// dd($request->category_id);
		$article = $this->articleRepository->storeArticle($request);
		// \Event::fire('App\Events\CreateArticle', ['name'=>"new Event"]);
		event(new \App\Events\ArticleEvents(['CreateArticle']));
		return redirect('/dashboard/articles/'.$request->category_id);
	}


	public function editArticle($articleId)
	{
		$article = $this->articleRepository->getArticleToEdit($articleId);
		$categories = $this->categoryRepository->getAllCategories();

		return view('backend.articles.edit')->with('article', $article)->with('categories', $categories);
	}
	

	public function updateArticle(StoreAndUpdateArticleRequest $request)
	{
		$article = $this->articleRepository->updateArticle($request);
		event(new \App\Events\ArticleEvents(['UpdateArticle']));
		return redirect('/dashboard/articles/'.$request->category_id);
	}


	public function deleteArticle(Request $request)
	{
		$delete = $this->articleRepository->deleteArticle($request);
		event(new \App\Events\ArticleEvents(['DeleteArticle']));		
		return back();
	}
	
//=========================

	

	//End BackEnd actions
}
