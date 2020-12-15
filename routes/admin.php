<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function (){
    Route::group(['middleware' => 'guest:admin'], function (){
        Route::get('/', 'IndexController@getLogin')->name('admin.getLogin');
        Route::post('login', 'IndexController@login')->name('admin.login');
    });
    Route::group(['middleware' => 'auth:admin'], function (){
        Route::get('/dashboard', 'IndexController@dashboard')->name('admin.dashboard');
        Route::group(['prefix' => 'users'], function (){
            Route::get('/', 'UsersController@index')->name('admin.users.index');
            Route::get('/create', 'UsersController@createUser')->name('admin.users.create');
            Route::post('/story', 'UsersController@storyUser')->name('admin.users.story');
        });
    });
});
