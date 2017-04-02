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
    return redirect('/profile');
})->name('home');


Route::get('/profile/{user?}', 'UserController@profile')->name('profile');


Route::get('/upload', 'FileController@upload');
Route::post('/upload', 'FileController@uploadFile');

Route::get('/search', 'UserController@search');

Route::get('/config', 'UserController@config');

Route::get('/edit', 'UserController@edit');

Route::group(['middleware' => 'isAdmin:admin'], function (){

    Route::get('/admin/panel', 'AdminController@index');

    Route::get('/admin/user/edit/{user}', 'AdminController@edit')->name('admin.user.edit');

    Route::get('/admin/user/profile/{user}', 'AdminController@profile')->name('admin.user.profile');

    Route::get('/admin/user/destroy/{user}', 'AdminController@destroy')->name('admin.user.destroy');
});

Route::get('/file', function (){
    return view ('file');
});

Route::get('/editf', function (){
    return view('editf');
});

Route::get('/comment', function (){
    return view('comment');
});

Route::get('/pruebas/{user?}', 'UserController@userIndex');




