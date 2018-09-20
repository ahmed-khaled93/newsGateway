<?php

namespace App\Repositories;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\Articles\StoreAndUpdateArticleRequest;
use App\Article;
use App\Category;


class ArticleRepository
{
// ------------------------------ Front End -------------------------
	public function showArticle($id)
	{
		$article = Article::find($id);
		return $article;
	}
// ------------------------------------------------------------------

// ------------------------------ Back End --------------------------


	public function getArticleById($id)
	{
		$articles = Article::where('category_id','=', $id)->get();
		return $articles;
	}


	public function getArticleToEdit($articleId)
	{
		$article = Article::find($articleId);
		return $article;
	}


	public function storeArticle(StoreAndUpdateArticleRequest $request)
	{
		
    	$article = new Article(request(['title','body','category_id']));

		$image = request('image');
		
    	$article->image  = time().'.'.$image->getClientOriginalExtension();

    	$image->move(public_path('/images/articles'),$article->image );

    	$article->save();

	}


	public function updateArticle(StoreAndUpdateArticleRequest $request)
	{

		$article = Article::find($request->hdnEditId);

		$article->update(request(['title','body','category_id']));

		if (request('image')) {
			
			$image_path = public_path('/images/articles').'/'.$article->image;
	    	
	    	unlink($image_path);

			$image = request('image');
	    	
	    	$article->image  = time().'.'.$image->getClientOriginalExtension();
	    
	    	$image->move(public_path('/images/articles'),$article->image );

	    	$article->save();

		}
	}


	public function deleteArticle(Request $request)
	{
		$delete = Article::find($request->hdnId);
		
		if ($delete->image) {
			
			$image_path = public_path('/images/articles').'/'.$delete->image;
	    	
	    	unlink($image_path);
	    }
		
		$delete->delete();
	}

// ------------------------------------------------------------------
	

	// public function lastTenArticles()
	// {
	// 	$articles = Article::orderBy('id', 'desc')->take(10)->get();
	// 	return $articles;
	// }

}
