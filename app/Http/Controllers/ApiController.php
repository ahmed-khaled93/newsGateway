<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ArticleRepository;
use App\Repositories\ApiRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\AlbumRepository;
use App\Repositories\UrgentRepository;
use App\Http\Requests\Backend\Articles\StoreAndUpdateArticleRequest;
use App\Http\Requests\Backend\Articles\storeApiRequest;
use App\Http\Requests\Backend\UrgentNews\urgentNewsRequest;
use App\Article;
use App\Category;
use App\Photo;

class ApiController extends Controller
{
    
	protected $articleRepository;
	protected $categoryRepository;
	protected $albumRepository;
	protected $urgentRepository;
	protected $apiRepository;

	public function __construct(ArticleRepository $articleRepository, CategoryRepository $categoryRepository, UrgentRepository $urgentRepository, AlbumRepository $albumRepository, ApiRepository $apiRepository)
    {
        $this->articleRepository = $articleRepository;
        $this->categoryRepository = $categoryRepository;
        $this->urgentRepository = $urgentRepository;
        $this->albumRepository = $albumRepository;
        $this->apiRepository  =	$apiRepository;
    }

// ==========================================================================================================

			// Articles //
	public function getArticlesByCategoryId($id)
	{
		$articles = $this->articleRepository->getArticleById($id);
		return response()->json($articles);
	}    

	public function latestArticles()
	{	
		$articles = Article::orderBy('id', 'desc')->take(10)->get();
		return response()->json($articles);
	}

	public function createNewArticle(storeApiRequest $request)
	{
		// return "test";
		$articles = $this->apiRepository->storeArticle($request);
		return response()->json($articles);
	}

	public function getArticleById($articleId)
	{
		$article = $this->apiRepository->getArticleById($articleId);
		// $categories = $this->categoryRepository->getAllCategories();

		return response()->json($article);
	}

	public function updateArticle(storeApiRequest $request, $id)
	{
		$article = $this->apiRepository->updateArticle($request,$id);
		// session()->flash('message', 'Article Updated Successfully');
		return response()->json($article);
	}

	public function deleteArticle(Request $request)
	{
		$delete = $this->apiRepository->deleteArticle($request);		
		return response()->json($delete);
	}


    		// Albums //
	public function photoAlbums()
	{
		$albums = $this->albumRepository->getAllAlbums();
		return response()->json($albums);
	}

			// Photos //
	public function getPhotosByAlbumId($albumId)
	{	
		$photos = $this->albumRepository->showAlbumPhotos($albumId);
		return response()->json($photos);
	}

	public function latestPhotos()
	{
		$photos = Photo::orderBy('id', 'desc')->take(10)->get();
		return response()->json($photos);
	}


}
