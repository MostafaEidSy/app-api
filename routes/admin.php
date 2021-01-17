<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'namespace' => 'Admin\Auth', 'middleware' => 'guest:admin'], function (){
    Route::get('/login/cp', 'LoginController@getLogin')->name('admin.login');
    Route::post('/login/cp', 'LoginController@login')->name('admin.getLogin');
});
Route::group(['middleware' => 'auth:admin', 'prefix' => 'cp/admin', 'namespace' => 'Admin'], function (){
    Route::get('/dashboard', 'GenralController@dashboard')->name('admin.dashboard');
    Route::get('/logout', 'GenralController@logout')->name('admin.logout');
    Route::get('/profile', 'GenralController@profile')->name('admin.profile');
    Route::post('/profile', 'GenralController@update')->name('admin.profile.update');
    // Start Routes Section Users
    Route::group(['prefix' => 'users'], function (){
        Route::get('/', 'UsersController@index')->name('admin.users.index');
        Route::get('/create', 'UsersController@createUser')->name('admin.users.create');
        Route::post('/story', 'UsersController@storyUser')->name('admin.users.story');
        Route::get('/edit/{id}', 'UsersController@edit')->name('admin.users.edit');
        Route::post('/update', 'UsersController@update')->name('admin.users.update');
        Route::get('/delete/{id}', 'UsersController@delete')->name('admin.users.delete');
    });
    // End Routes Section Users

    // Start Routes Section Categories
    Route::group(['prefix' => 'categories'], function (){
        Route::get('/', 'CategoryController@index')->name('admin.category.index');
        Route::get('/create', 'CategoryController@create')->name('admin.category.create');
        Route::post('/create', 'CategoryController@story')->name('admin.category.story');
        Route::get('/edit-category/{id}', 'CategoryController@editCategory')->name('admin.category.edit');
        Route::get('/edit-parent-category/{id}', 'CategoryController@editSubCategory')->name('admin.sub.category.edit');
        Route::post('/update', 'CategoryController@update')->name('admin.category.update');
        Route::get('/delete-category/{id}', 'CategoryController@deleteCat')->name('admin.category.delete');
        Route::get('/delete-parent-category/{id}', 'CategoryController@deleteSub')->name('admin.sub.category.delete');
    });
    // End Routes Section Categories

    // Start Routes Section Pages
    Route::group(['prefix' => 'pages'], function (){
        Route::get('/', 'PagesController@index')->name('admin.pages.index');
        Route::get('/create', 'PagesController@create')->name('admin.pages.create');
        Route::post('/create', 'PagesController@story')->name('admin.pages.story');
        Route::get('/edit/{id}', 'PagesController@edit')->name('admin.pages.edit');
        Route::post('/update', 'PagesController@update')->name('admin.pages.update');
        Route::get('/delete/{id}', 'PagesController@delete')->name('admin.pages.delete');
    });
    // End Routes Section Pages

    // Start Routes Section Articles
    Route::group(['prefix' => 'articles'], function (){
        Route::get('/', 'ArticlesController@index')->name('admin.articles.index');
        Route::get('/create', 'ArticlesController@create')->name('admin.articles.create');
        Route::post('/create', 'ArticlesController@story')->name('admin.articles.story');
        Route::get('/edit/{id}', 'ArticlesController@edit')->name('admin.articles.edit');
        Route::post('/update', 'ArticlesController@update')->name('admin.articles.update');
        Route::get('/delete/{id}', 'ArticlesController@delete')->name('admin.articles.delete');
    });
    // End Routes Section Articles

    // Start Routes Section Vimeo
    Route::group(['prefix' => 'vimeo'], function (){
        Route::get('/', 'VimeoController@index')->name('admin.vimeo.index');
        Route::get('/setting', 'VimeoController@setting')->name('admin.vimeo.setting');
        Route::post('/setting', 'VimeoController@updateSetting')->name('admin.vimeo.setting.update');
    });
    // End Routes Section Vimeo

    // Start Routes Section Front End
    Route::group(['prefix' => 'frontend'], function (){
        // Start Routes Section Thread
        Route::group(['prefix' => 'thread'], function (){
            Route::get('/', 'ThreadController@index')->name('admin.thread.index');
            Route::get('/create', 'ThreadController@create')->name('admin.thread.create');
            Route::post('/create', 'ThreadController@story')->name('admin.thread.story');
            Route::get('/edit/{id}', 'ThreadController@edit')->name('admin.thread.edit');
            Route::post('/update', 'ThreadController@update')->name('admin.thread.update');
            Route::get('/delete/{id}', 'ThreadController@delete')->name('admin.thread.delete');
        });
        // End Routes Section Thread

        // Start Routes Section Expert
        Route::group(['prefix' => 'expert'], function (){
            Route::get('/', 'ExpertController@index')->name('admin.expert.index');
            Route::get('/create', 'ExpertController@create')->name('admin.expert.create');
            Route::post('/create', 'ExpertController@story')->name('admin.expert.story');
            Route::get('/edit/{id}', 'ExpertController@edit')->name('admin.expert.edit');
            Route::post('/update', 'ExpertController@update')->name('admin.expert.update');
            Route::get('/delete/{id}', 'ExpertController@delete')->name('admin.expert.delete');
        });
        // End Routes Section Expert
    });
    // End Routes Section Front End
});
