<?php

namespace App\Repositories;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Backend\Albums\storeNewAlbumRequest;
use App\Article;
use App\Catg;
use App\Album;


class CategoryRepository
{

// ---------------------------------- Front End ------------------------------------------
	public function getArticleByName($catName)
	{
		$cat = Catg::with('articles')->where('title', '=', $catName)->get();
		$articles = $cat[0]->articles;
		return $articles;
	}
// ---------------------------------------------------------------------------------------

// ------------------------------ Back End --------------------------

	public function getCreateArticlePage()
	{
		$catgs = Catg::all();
		return $catgs;
	}

// ------------------------------------------------------------------

}
