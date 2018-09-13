<?php

namespace App\Repositories;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\Articles\StoreAndUpdateArticleRequest;
use App\Http\Requests\Backend\Articles\storeApiRequest;
use App\Article;
use App\Catg;


class ApiRepository
{
	public function getArticleById($articleId)
	{
		$article = Article::find($articleId);
		return $article;
	}

	public function storeArticle(storeApiRequest $request)
	{
		
    	$article = new Article(request(['title','body','catg_id']));

		$image = request('image');
		// $image = base64_encode(file_get_contents($request->file('image')->pat‌​h())); 
		
		$myArr = explode(';', $image);
		$arr2 = explode('/', $myArr[0]);
		$ext = $arr2[1];
        $image = str_replace('data:image/'.$ext.';base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = str_random(10).'.'.$ext;
        \File::put(public_path('/images/articles'). '/' . $imageName, base64_decode($image));

    	$article->image  = $imageName;//time().'.'.$image->getClientOriginalExtension();

    	//$image->move(public_path('/images/articles'),$article->image );

    	$article->save();
    	return 'success';
	}


	public function updateArticle(storeApiRequest $request, $id)
	{
		
    	$article = Article::find($id);

    	$article->update(request(['title','body','catg_id']));

    	if (request('image')) {
			
			$image_path = public_path('/images/articles').'/'.$article->image;
	    	
	    	unlink($image_path);

			$image = request('image');
	    	
	    	$myArr = explode(';', $image);
			$arr2 = explode('/', $myArr[0]);
			$ext = $arr2[1];
	        $image = str_replace('data:image/'.$ext.';base64,', '', $image);
	        $image = str_replace(' ', '+', $image);
	        $imageName = str_random(10).'.'.$ext;
	        \File::put(public_path('/images/articles'). '/' . $imageName, base64_decode($image));

	    	$article->image  = $imageName;

	    	$article->save();

	    	return 'Update Success';
		}

	}


	public function deleteArticle(Request $request)
	{	
		// dd($request);
		$delete = Article::find($request->hdnId);
		
		if ($delete->image) {
			
			$image_path = public_path('/images/articles').'/'.$delete->image;
	    	
	    	unlink($image_path);
	    }
		
		$delete->delete();

		return 'Article Deleted';
	}
	

}
