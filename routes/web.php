<?php

use App\Catg;
use App\Album;
use App\Photo;
use App\Article;
use App\Urgent;
use Carbon\Carbon;

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
	$photos = Photo::orderBy('id', 'desc')->take(8)->get();
	$articles = Article::orderBy('id', 'desc')->take(4)->get();
	$urgent = Urgent::latest()->get();

    return view('frontend.index', compact('photos', 'articles', 'urgent'));
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
	Route::get('/', function()
	{
		$categories = Catg::categories();
		$albums = Album::albums();
		
		return view('backend.index');
	});
	
	Route::get('articles/edit/{article}','ArticleController@editArticle');
	
	Route::get('articles/create','ArticleController@create');
	
	Route::get('articles/{id}','ArticleController@dashboardArticles');
	
	Route::get('multimedia/albums','AlbumController@photoAlbums');
	
	Route::get('albums/photos/{albumId}', 'AlbumController@showAlbumPhotos');
	
	Route::get('albums/AddImage','AlbumController@AddImage');

	Route::get('urgentnews', 'UrgentController@urgentnews');



	Route::post('/createArticle','ArticleController@store');
	
	Route::post('articles/edit/{articleId}','ArticleController@updateArticle');
	
	Route::post('article/delete', 'ArticleController@deleteArticle')->name('delete_article');
	
	Route::post('albums/createNewAlbum', 'AlbumController@storeNewAlbum');
	
	Route::post('albums/addNewImage/{albumId}', 'AlbumController@storeNewImage');

	Route::post('albums/deleteImage', 'AlbumController@deleteImage')->name('delete_image');

	Route::post('newUrgentNews', 'UrgentController@newUrgentNews');

	Route::post('urgentnews/delete', 'UrgentController@deleteurgentnews')->name('delete_urgentnews');

	Route::post('updateUrgentNews', 'UrgentController@updateUrgentNews');


});
