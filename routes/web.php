<?php

use App\Catg;
use App\Album;

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

// ------------------------------- Photos ------------------------------------------

Route::get('/albums/albums', 'AlbumController@albums');

Route::get('/albums/view/{albumId}', 'AlbumController@viewAlbums');

Route::get('/albums/photos', 'AlbumController@photos');

// ------------------------------- play lists ---------------------------------------

Route::get('/albums/videoLists', 'AlbumController@videoLists');

Route::get('/albums/videos', 'AlbumController@videos');

Route::get('/album/video/list/{listId}/show/{videoId}', 'AlbumController@showVideo');

// --------------------------------- Channels ----------------------------------------

Route::get('/albums/channelLists', 'AlbumController@channels');

Route::get('/albums/channel/listVideos', 'AlbumController@channelLists');

Route::get('/album/channel/list/{id}', 'AlbumController@channelListItems');

// Route::get('/album/video/list/{channelId}/show/{videoId}', 'AlbumController@showVideo');


// ================================ Back End =======================================

Route::prefix('dashboard')->group(function()
{
	Route::get('articles/edit/{article}','ArticleController@editArticle');
	
	Route::get('articles/create','ArticleController@create');
	
	Route::get('articles/{id}','ArticleController@dashboardArticles');
	
	Route::get('multimedia/albums','AlbumController@photoAlbums');
	
	Route::get('albums/photos/{albumId}', 'AlbumController@showAlbumPhotos');
	
	Route::get('albums/AddImage','AlbumController@AddImage');


	Route::post('/createArticle','ArticleController@store');
	
	Route::post('articles/edit/{articleId}','ArticleController@updateArticle');
	
	Route::post('article/delete', 'ArticleController@deleteArticle')->name('delete_article');
	
	Route::post('albums/createNewAlbum', 'AlbumController@storeNewAlbum');
	
	Route::post('albums/addNewImage/{albumId}', 'AlbumController@storeNewImage');

	Route::post('albums/deleteImage', 'AlbumController@deleteImage')->name('delete_image');

	Route::get('/', function()
	{
		$categories = Catg::categories();
		$albums = Album::albums();
		
		return view('backend.index');
	});

});
