<?php

namespace App\Repositories;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Backend\Albums\storeNewAlbumRequest;
use App\Article;
use App\Category;
use App\Album;
use App\CategoryTranslation;


class CategoryRepository
{

// ---------------------------------- Front End ------------------------------------------
	public function getArticleByName($catName)
	{
		$cat = CategoryTranslation::where('title', '=', $catName)->first();
		
		$articles =  Article::where('category_id', '=', $cat->category_id)->get();
		// dd($articles);
		return $articles;
	}
// ---------------------------------------------------------------------------------------

// ------------------------------ Back End --------------------------

	public function getAllCategories()
	{
		$categories = Category::all();
		return $categories;
	}

// ------------------------------------------------------------------

}
