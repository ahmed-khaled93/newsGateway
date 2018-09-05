<?php

use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


				// articles //
Route::middleware('auth:api')->get('article/latestTenArticles','ApiController@latestArticles');

Route::middleware('auth:api')->post('article/createNewArticle','ApiController@createNewArticle');

Route::middleware('auth:api')->post('article/delete','ApiController@deleteArticle');

Route::middleware('auth:api')->get('article/get/{id}','ApiController@getArticleById');

Route::middleware('auth:api')->post('article/updateArticle/{id}','ApiController@updateArticle');


Route::middleware('auth:api')->get('articles/{categoryId}', 'ApiController@getArticlesByCategoryId');

				// Albums //
Route::middleware('auth:api')->get('multimedia/albums','ApiController@photoAlbums');

				// Photos // 
Route::middleware('auth:api')->get('multimedia/photos/{albumId}','ApiController@getPhotosByAlbumId');

Route::middleware('auth:api')->get('multimedia/lastTenPhotos','ApiController@latestPhotos');

