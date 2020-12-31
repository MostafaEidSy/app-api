<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Site'], function (){
   Route::group(['namespace' => 'Home'], function (){
     Route::get('/', 'IndexController@index')->name('home.index');
     Route::get('/login', 'IndexController@getLogin')->name('home.getLogin');
     Route::get('/registrierung', 'IndexController@getRegister')->name('home.getRegister');
   });
   Route::group(['namespace' => 'Dashboard'], function (){
      Route::get('/dashboard', 'IndexController@index')->name('home.dashboard');
   });
});
