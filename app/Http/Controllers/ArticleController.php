<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ArticleRepository;
use App\Repositories\CategoryRepository;
use App\Http\Requests\Backend\Articles\StoreAndUpdateArticleRequest;
use App\Article;
use App\Catg;

class ArticleController extends Controller
{

	protected $articleRepository;
	protected $categoryRepository;

	public function __construct(ArticleRepository $articleRepository, CategoryRepository $categoryRepository)
    {
        $this->articleRepository = $articleRepository;
        $this->categoryRepository = $categoryRepository;
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
		$menuArticles = ['articles', 'catg_id'];

		return view('backend.articles.articles',compact('articles', 'menuArticles') );
	}


	public function create(CategoryRepository $CategoryRepository)
	{
		$catgs = $CategoryRepository->getCreateArticlePage();
		return view('backend.articles.create', compact('catgs'));
	}


	public function store(StoreAndUpdateArticleRequest $request)
	{
		$article = $this->articleRepository->storeArticle($request);
		return redirect('/dashboard/articles/'.$request->catg_id);
	}


	public function editArticle($articleId)
	{
		$article = $this->articleRepository->getArticleToEdit($articleId);
		$categories = $this->categoryRepository->getCreateArticlePage();

		return view('backend.articles.edit')->with('article', $article)->with('categories', $categories);
	}
	

	public function updateArticle($articleId, StoreAndUpdateArticleRequest $request)
	{
		$article = $this->articleRepository->updateArticle($articleId, $request);
		return redirect('/dashboard/articles/'.$request->catg_id);
	}


	public function deleteArticle(Request $request)
	{
		$delete = $this->articleRepository->deleteArticle($request);		
		return back();
	}
	
	//End BackEnd actions
}
