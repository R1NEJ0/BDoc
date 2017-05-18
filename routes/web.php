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

/*
Route::get('/home', [
    'as' => 'home',
    'uses' => 'HomeController@index'
]);

*/

Route::get('/home', function (){
    return redirect('/index');
})->name('home');

Route::get('/upload', 'FileController@upload');
Route::post('/upload', 'FileController@uploadFile');

Route::get('/search', 'FileController@search');

Route::get('/config', 'UserController@config');

Route::get('/edit', 'UserController@edit');

Route::group(['middleware' => 'isAdmin:admin'], function (){

    Route::get('/admin/panel', 'AdminController@index');

    Route::get('/admin/user/edit/{user}', 'AdminController@edit')->name('admin.user.edit');

    Route::get('/admin/user/profile/{user}', 'UserController@getUserIndex')->name('admin.user.profile');

    Route::get('/admin/user/destroy/{user}', 'AdminController@destroy')->name('admin.user.destroy');
});

Route::get('/file/{file}', 'FileController@index')->name('file.info');

Route::get('/file/delete/{file}', 'FileController@destroy');

Route::get('/file/comment/delete={comment}', 'CommentController@destroy');
Route::get('/file/comment/edit={comment}', 'CommentController@edit');
Route::get('/file/comment/create={file}', 'CommentController@create');
Route::post('/file/comment/store={file}', 'CommentController@store');

Route::get('/file/comment/update/{comment}', 'CommentController@update');

Route::get('/file/edit/{file}', 'FileController@edit');
Route::get('/file/update/{file}', 'FileController@update');
Route::get('/file/like/{file}', 'ValorationController@like');
Route::get('/file/dislike/{file}', 'ValorationController@dislike');



Route::get('/comment', function (){
    return view('comment');
});

Route::get('/index', 'UserController@Index');

Route::get('/profile/{user}', 'UserController@getUserIndex');




