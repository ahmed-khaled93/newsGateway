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

// Route::get('/', function ()
// {
// 	$catgs = Catg::catgs();
// 	$photos = Photo::orderBy('id', 'desc')->take(8)->get();
// 	$articles = Article::orderBy('id', 'desc')->take(4)->get();
// 	$urgent = Urgent::latest()->get();

//     return view('frontend.index', compact('photos', 'articles', 'urgent'));
// });


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

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

Route::group(['prefix'=>'dashboard', 'middleware'=>'auth'], function()
{
	Route::get('/', [
		'uses'			=>	'HomeController@dashboard',
		'as'			=>	'backend.index',
		'middleware'	=>	'roles',
		'roles'			=>	['Author','Admin']
	]);
	
	Route::get('articles/{id}',[
		'uses'			=>	'ArticleController@dashboardArticles',
		'as'			=>	'backend.articles.articles',
		'middleware'	=>	'roles',
		'roles'			=>	['Author','Admin']
	]);
	
	// Route::get('articles/create',[
	// 	'uses'			=>	'ArticleController@create',
	// 	'as'			=>	'backend.articles.create',
	// 	'middleware'	=>	'roles',
	// 	'roles'			=>	['Author','Admin']
	// // 'ArticleController@create'
	// ]);
	
	// Route::get('articles/edit/{article}',[
	// 	'uses'			=>	'ArticleController@editArticle',
	// 	'as'			=>	'backend.articles.edit',
	// 	'middleware'	=>	'roles',
	// 	'roles'			=>	['Author','Admin']
	// 	// 'ArticleController@editArticle'
	// ]);
	
	Route::get('multimedia/albums',[
		'uses'			=>	'AlbumController@photoAlbums',
		'as'			=>	'backend.albums.albums',
		'middleware'	=>	'roles',
		'roles'			=>	['Admin']
	]);
	
	Route::get('albums/photos/{albumId}', [
		'uses'			=>	'AlbumController@showAlbumPhotos',
		'as'			=>	'backend.albums.albums',
		'middleware'	=>	'roles',
		'roles'			=>	['Admin']
		// 'AlbumController@showAlbumPhotos'
	]);
	
	// Route::get('albums/AddImage','AlbumController@AddImage');
	Route::get('urgentnews', [
		'uses'			=>	'UrgentController@urgentnews',
		'as'			=>	'backend.articles.urgentnews',
		'middleware'	=>	'roles',
		'roles'			=>	['Admin']
		// 'UrgentController@urgentnews'
	]);

	Route::get('eventsHistory', [
		'uses'			=>	'EventHistoryController@eventsHistory',
		'as'			=>	'backend.events.articleEvents',
		'middleware'	=>	'roles',
		'roles'			=>	['Admin']
		// 'UrgentController@urgentnews'
	]);
	

	Route::post('/createArticle','ArticleController@store');
	Route::post('articles/edit','ArticleController@updateArticle');
	Route::post('article/delete', 'ArticleController@deleteArticle')->name('delete_article');
	Route::post('albums/createNewAlbum', 'AlbumController@storeNewAlbum');
	Route::post('albums/addNewImage/{albumId}', 'AlbumController@storeNewImage');
	Route::post('albums/deleteImage', 'AlbumController@deleteImage')->name('delete_image');
	Route::post('newUrgentNews', 'UrgentController@newUrgentNews');
	Route::post('urgentnews/delete', 'UrgentController@deleteurgentnews')->name('delete_urgentnews');
	Route::post('updateUrgentNews', 'UrgentController@updateUrgentNews');
});

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
