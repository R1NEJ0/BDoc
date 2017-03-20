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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [
    'as' => 'home',
    'uses' => 'HomeController@index'
]);

Route::get('/upload', 'FileController@upload');
Route::post('/upload', 'FileController@uploadFile');

Route::get('/search', 'UserController@search');

Route::get('/config', 'UserController@config');

Route::group(['middleware' => 'isAdmin:admin'], function (){

    Route::get('/dashboard', function (){
        return view('admin.dashboard');
    });
});



