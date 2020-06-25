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



Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    //記事管理
    Route::get('/post', 'PostController@manage')->name('admin.post.manage');
    Route::get('/post/{post}', 'PostController@showAdmin')->name('admin.post.show');
    Route::get('/post/create', 'PostController@create')->name('admin.post.create');
    Route::post('/post/store', 'PostController@store')->name('admin.post.store');
    Route::get('/post/edit/{post}', 'PostController@edit')->name('admin.post.edit');
    Route::post('/post/update/{post}', 'PostController@update')->name('admin.post.update');

    Route::get('/home', 'HomeController@index')->name('admin.home');
    Route::get('/player-transform', 'HomeController@showTransform')->name('player-transform');
    Route::post('/player-transform', 'HomeController@deleteTransform')->name('delete.player-transform');
});
