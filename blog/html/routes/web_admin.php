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
    Route::get('/article', 'ArticleController@manage')->name('admin.article.manage');
    Route::get('/article/create', 'ArticleController@create')->name('admin.article.create');
    Route::get('/article/edit/{article}', 'ArticleController@edit')->name('admin.article.edit')->where('article', '[0-9a-z-]+');
    Route::get('/article/show/{article}', 'ArticleController@showAdmin')->name('admin.article.show')->where('article', '[0-9a-z-]+');
    Route::post('/article/update/{article}', 'ArticleController@update')->name('admin.article.update')->where('article', '[0-9a-z-]+');


    Route::post('article/upload-image', 'ImageController@storeImage')->name('admin.article.upload-image');

    Route::get('/home', 'HomeController@index')->name('admin.home');
    Route::get('/player-transform', 'HomeController@showTransform')->name('player-transform');
    Route::post('/player-transform', 'HomeController@deleteTransform')->name('delete.player-transform');
});
