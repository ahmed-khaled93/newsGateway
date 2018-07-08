<?php

use App\Catg;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function ()
{

	$catgs = Catg::catgs();

    return view('frontend.index');

});


Auth::routes();

// Route::get('/', 'HomeController@index')->name('home');

Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');

Route::get('/articles/{article}','ArticleController@show');

Route::get('/categories/{catName}','ArticleController@articles');




// ================================ Back End =======================================


Route::get('/dashboard', function()
{
	$categories = Catg::categories();

	return view('backend.index');

});

Route::get('/dashboard/articles/create','ArticleController@create');

Route::get('/dashboard/articles/{id}','ArticleController@dashboardArticles');

Route::post('/createArticle','ArticleController@store');

Route::get('/dashboard/articles/edit/{article}','ArticleController@editArticle');

Route::post('/dashboard/articles/edit/{articleId}','ArticleController@updateArticle');

Route::get('/articles/delete/{articleId}', 'ArticleController@deleteArticle');