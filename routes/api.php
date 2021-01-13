<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Api'], function (){
   Route::post('/login', 'UsersController@login')->name('api.login');
   Route::post('/register', 'UsersController@register')->name('api.register');
   Route::get('/check-auth', 'UsersController@checkAuth')->name('api.check.auth');
});
Route::group(['namespace' => 'Api', 'middleware' => 'auth:api'], function (){
    Route::get('/profile', 'UsersController@profile')->name('api.profile');
    Route::get('/all-category', 'InfoController@categories')->name('api.all.category');
    Route::get('/info-category/{id}', 'InfoController@infoCategories')->name('api.info.category');
    Route::get('/sub-category/{parent}', 'InfoController@subCategory')->name('api.sub.category');
});
