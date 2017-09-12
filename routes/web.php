<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('/', function () {
	  if(Auth::check()){return Redirect::to('home');}
    
    return view('welcome');
});


Route::get('/account', function () {
	  
    
    return view('account');
});


Route::get('/account', function () {
      
    
    return view('account');
});




Route::get('/library', [
    'uses' => 'BookController@getLibrary',
    'as' => 'library'
]);



Route::get('/search', [
    'uses' => 'BookController@search',
    'as' => 'search'
]);
Route::post('/check', [
    'uses' => 'BookController@check',
    'as' => 'check'
]);

 

Route::get('/upload', 'BookController@upload');  

Route::post('/upload_book', 'BookController@upload_book');

Route::post('/upload_cover/{id}', 'BookController@change_cover');

Route::post('/book/edit/{id}', 'BookController@editBook');

Route::get('/book/{id}' , 'BookController@getBook');


Route::get('/book/delete/{id}' , 'BookController@deleteBook');

Route::post('/change_username' ,[
    'uses' => 'AccountController@change_username' ,
    'as'    => 'change_username'
    ]);
Route::post('/change_password',[
    'uses' => 'AccountController@change_password' ,
    'as'    => 'change_password'
    ]);



Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
 



Auth::routes();

Route::get('/home', 'HomeController@index');




Route::get('auth/{provider}', '\App\Http\Controllers\Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', '\App\Http\Controllers\Auth\LoginController@handleProviderCallback');
