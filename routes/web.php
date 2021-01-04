<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Site\Home', 'middleware' => 'guest:web'], function (){
   Route::get('/', 'IndexController@index')->name('home.index');
   Route::get('/login', 'IndexController@getLogin')->name('home.getLogin');
   Route::post('/login', 'IndexController@login')->name('home.login');
   Route::get('/registrierung', 'IndexController@getRegister')->name('home.getRegister');
   Route::post('/register', 'IndexController@register')->name('home.register');
});
Route::group(['namespace' => 'Site\Dashboard'], function (){
    Route::get('/dashboard', 'IndexController@index')->name('home.dashboard');
    Route::group(['middleware' => 'auth:web'], function (){
        Route::get('/logout', 'IndexController@logout')->name('home.dashboard.logout');
        Route::get('/account', 'IndexController@account')->name('home.dashboard.account');
        Route::post('/account', 'IndexController@update')->name('home.dashboard.account.update');
        Route::get('/services', 'IndexController@services')->name('home.dashboard.services');
        Route::get('/mastermind-willkommen', 'IndexController@mastermind')->name('home.dashboard.mastermind');
        Route::get('mastermind/{slug}', 'IndexController@categorySlug')->name('home.dashboard.category.slug');
        Route::get('{category}/{slug}', 'IndexController@subCategorySlug')->name('home.dashboard.sub.category.slug');
    });
});
Route::get('/test-auth', function (){

});
