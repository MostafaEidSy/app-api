<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Api'], function (){
   Route::post('/login', 'UsersController@login')->name('api.login');
   Route::post('/register', 'UsersController@register')->name('api.register');
});
Route::group(['namespace' => 'Api', 'middleware' => 'auth:api'], function (){
    Route::get('/profile', 'UsersController@profile')->name('api.profile');
    Route::get('/all-category', 'InfoController@categories')->name('api.all.category');
});
