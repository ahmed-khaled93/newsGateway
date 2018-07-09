<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Catg;

class ArticleController extends Controller
{

// ============================ Front End ====================================	


	public function articles($catName)
	{
		$cat = Catg::with('articles')->where('title', '=', $catName)->get();
		$articles = $cat[0]->articles;
		return view ('frontend.articles.categories',compact('articles'));

	}
    


	public function show($id)
	{

		$article = Article::find($id);

		return view('frontend.articles.show' , compact('article'));

	}


	

// =============================== Back End ===================================

	public function dashboardArticles($id)
	{

		$articles = Article::where('catg_id','=', $id)->get();

		return view('backend.articles.articles',compact('articles') );

	}


	public function create()
	{

		$catgs = Catg::all();

		return view('backend.articles.create', compact('catgs'));

	}


	public function store(Request $request)
	{
		
		$this->validate($request, [

        	'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

    	]);

		// dd(request(['title','body','catg_id']));

		
    	$article = new Article(request(['title','body','catg_id']));

		$image = request('image');
		
    	$article->image  = time().'.'.$image->getClientOriginalExtension();

    	$image->move(public_path('/images/articles'),$article->image );

    	$article->save();


		// Article::create(request(['title','body','catg_id','image']));

		return redirect('/dashboard/articles/'.$request->catg_id);

	}


	public function editArticle($articleId)
	{
		$article = Article::find($articleId);

		$categories = Catg::all();

		return view('backend.articles.edit')->with('article', $article)->with('categories', $categories);

	}
	

	public function updateArticle($articleId, Request $request)
	{
		// dd($request);
		$article = Article::find($articleId);

		// dd($article->image);
		// $article->delete(public_path('/images/articles'),$article->image);
		// File::delete($article->image);
		

    	
    	// $article->image->delete();
    	// $image_path->delete();
    	
    	

		$article->update(request(['title','body','catg_id']));

		if (request('image')) {
			
			$image_path = public_path('/images/articles').'/'.$article->image;
	    	
	    	unlink($image_path);

			$image = request('image');
	    	
	    	$article->image  = time().'.'.$image->getClientOriginalExtension();
	    	// dd($image);

	    	$image->move(public_path('/images/articles'),$article->image );

	    	$article->save();
			
		}
		

		return redirect('/dashboard/articles/'.$request->catg_id);

	}


	public function deleteArticle(Request $request)
	{
		
		$hdnId = $request->hdnId;
		// dd($hdnId);

		$delete = Article::find($request->hdnId);
		// dd($delete);
		
		if ($delete->image) {
			// dd($delete->image);
			
			$image_path = public_path('/images/articles').'/'.$delete->image;
	    	
	    	unlink($image_path);
	    }
		

		$delete->delete();

		return back();

	}


}
