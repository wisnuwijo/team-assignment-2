<?php

Route::get('/', function () {
    if (!Auth::guest()) {
        return redirect('/home');
    }
    
    return view('auth.login');
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth', 'prefix' => '/users'], function() {
    Route::get('/', 'UserController@index');
    Route::get('/add', 'UserController@add');
    Route::post('/store','UserController@store');
    Route::get('/delete/{id}', 'UserController@delete');
    Route::post('/{id}', 'UserController@update');
    Route::get('/{id}', 'UserController@edit');
});

Route::group(['middleware' => 'auth', 'prefix' => '/products'], function() {
    Route::get('/', 'ProductsController@index');
    Route::get('/add', 'ProductsController@add');
    Route::post('/store','ProductsController@store');
    Route::get('/delete/{id}', 'ProductsController@delete');
    Route::post('/{id}', 'ProductsController@update');
    Route::get('/{id}', 'ProductsController@edit');
});

