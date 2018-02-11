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

Route::get('/', 'UserController@index');

Route::get('/logout', function() { 
    Auth::logout();    
    return redirect()->back();
})->name('logout');

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::get('users/search', 'UserController@index')->name('users.search');
    Route::resource('users', 'UserController');
    Route::resource('follows', 'FollowController');
    Route::resource('statuses', 'StatusController');
    Route::resource('comments', 'CommentController');
});