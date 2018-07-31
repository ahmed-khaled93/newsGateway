<?php

namespace App\Repositories;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\Articles\StoreAndUpdateArticleRequest;
use App\Article;
use App\Catg;


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
		$articles = Article::where('catg_id','=', $id)->get();
		return $articles;
	}


	public function getArticleToEdit($articleId)
	{
		$article = Article::find($articleId);
		return $article;
	}


	public function storeArticle(StoreAndUpdateArticleRequest $request)
	{
		
    	$article = new Article(request(['title','body','catg_id']));

		$image = request('image');
		
    	$article->image  = time().'.'.$image->getClientOriginalExtension();

    	$image->move(public_path('/images/articles'),$article->image );

    	$article->save();

	}


	public function updateArticle($articleId, StoreAndUpdateArticleRequest $request)
	{

		$article = Article::find($articleId);

		$article->update(request(['title','body','catg_id']));

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
	

}
