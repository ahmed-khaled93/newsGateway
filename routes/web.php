<?php

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

Route::get('/', function () {
    return view('frontend.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');

Route::get('/sport','ArticleController@sportindex');

Route::get('/history','ArticleController@historyindex');

Route::get('/science','ArticleController@scienceindex');

Route::get('/art','ArticleController@artindex');











Route::get('/search', function(){

	return view('frontend.search');

});

Route::get('/contact',function(){

	return view('frontend.contact-us');

});

Route::get('/category',function(){

	return view('frontend.category');

});