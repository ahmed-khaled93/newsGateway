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
		$cat = Category::with('articles')->where('title', '=', $catName)->get();
		$articles = $cat[0]->articles;
		return $articles;
	}
// ---------------------------------------------------------------------------------------

// ------------------------------ Back End --------------------------

	public function getAllCategories()
	{
		$catgs = Category::all();
		return $catgs;
	}

// ------------------------------------------------------------------

}
