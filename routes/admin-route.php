<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function(){
    return redirect()->route('home');
});
Route::group(['middleware' => ['admin']], function () {

Route::get('/dashboard', 'Admin\AdminController@index')->name('admin-dashboard');
      Route::prefix('profile')->name('profile')->group(function () {
          Route::get('/change-password','Admin\ProfileController@ChangePasswordView')->name('.change-password');
          Route::post('/change-password','Admin\ProfileController@ChangePasswordSave');
      });
    Route::prefix('category')->name('category')->group(function () {
        Route::get('/list','Admin\CategoryController@index')->name('.view');
        Route::get('/add','Admin\CategoryController@add')->name('.add');
        Route::post('/add','Admin\CategoryController@save');
        Route::get('/edit/{id}','Admin\CategoryController@edit')->name('.edit');
        Route::post('/edit/{id}','Admin\CategoryController@update');
        Route::get('/delete/{id}', 'Admin\CategoryController@delete')->name('.delete');
    });
    Route::prefix('news')->name('news')->group(function () {
        Route::get('/list','Admin\NewsController@index')->name('.view');
        Route::get('/add','Admin\NewsController@add')->name('.add');
        Route::post('/add','Admin\NewsController@save');
        Route::get('/edit/{id}','Admin\NewsController@edit')->name('.edit');
        Route::post('/edit/{id}','Admin\NewsController@update');
        Route::get('/delete/{id}', 'Admin\NewsController@delete')->name('.delete');
    });
    Route::prefix('breaking-news')->name('breaking-news')->group(function () {
        Route::get('/list','Admin\BreakingnewsController@index')->name('.view');
        Route::get('/add','Admin\BreakingnewsController@add')->name('.add');
        Route::post('/add','Admin\BreakingnewsController@save');
        Route::get('/edit/{id}','Admin\BreakingnewsController@edit')->name('.edit');
        Route::post('/edit/{id}','Admin\BreakingnewsController@update');
        Route::get('/delete/{id}', 'Admin\BreakingnewsController@delete')->name('.delete');
    });
    Route::prefix('ngo-gallery')->name('ngo-gallery')->group(function () {
        Route::get('/list','Admin\NgogalleryController@index')->name('.view');
        Route::get('/add','Admin\NgogalleryController@add')->name('.add');
        Route::post('/add','Admin\NgogalleryController@save');
        Route::get('/edit/{id}','Admin\NgogalleryController@edit')->name('.edit');
        Route::post('/edit/{id}','Admin\NgogalleryController@update');
        Route::get('/delete/{id}', 'Admin\NgogalleryController@delete')->name('.delete');
    });
    Route::prefix('social-video')->name('social-video')->group(function () {
        Route::get('/list','Admin\SocialvideoController@index')->name('.view');
        Route::get('/add','Admin\SocialvideoController@add')->name('.add');
        Route::post('/add','Admin\SocialvideoController@save');
        Route::get('/edit/{id}','Admin\SocialvideoController@edit')->name('.edit');
        Route::post('/edit/{id}','Admin\SocialvideoController@update');
        Route::get('/delete/{id}', 'Admin\SocialvideoController@delete')->name('.delete');
    });
    Route::prefix('aim-india-image')->name('aim-india-image')->group(function () {
        Route::get('/list','Admin\AimindiaimageController@index')->name('.view');
        Route::get('/add','Admin\AimindiaimageController@add')->name('.add');
        Route::post('/add','Admin\AimindiaimageController@save');
        Route::get('/edit/{id}','Admin\AimindiaimageController@edit')->name('.edit');
        Route::post('/edit/{id}','Admin\AimindiaimageController@update');
        Route::get('/delete/{id}', 'Admin\AimindiaimageController@delete')->name('.delete');
    });
    Route::prefix('advertisement')->name('advertisement')->group(function () {
        Route::get('/list','Admin\AdvertisementController@index')->name('.view');
        Route::get('/add','Admin\AdvertisementController@add')->name('.add');
        Route::post('/add','Admin\AdvertisementController@save');
        Route::get('/edit/{id}','Admin\AdvertisementController@edit')->name('.edit');
        Route::post('/edit/{id}','Admin\AdvertisementController@update');
        Route::get('/delete/{id}', 'Admin\AdvertisementController@delete')->name('.delete');
    });
    Route::prefix('comment')->name('comment')->group(function () {
        Route::get('/list','Admin\CommentController@index')->name('.view');
        Route::get('/delete/{id}', 'Admin\CommentController@delete')->name('.delete');
    });
    Route::prefix('contact-message')->name('contact-message')->group(function () {
        Route::get('/list','Admin\ContactController@index')->name('.view');
        Route::get('/delete/{id}', 'Admin\ContactController@delete')->name('.delete');
    });
    Route::prefix('advertisement-request')->name('advertisement-request')->group(function () {
        Route::get('/list','Admin\AdvertisementrequestController@index')->name('.view');
        Route::get('/delete/{id}', 'Admin\AdvertisementrequestController@delete')->name('.delete');
    });
    Route::prefix('subscribers')->name('subscribers')->group(function () {
        Route::get('/list','Admin\SubscribeController@index')->name('.view');
    });
    Route::prefix('contents')->name('contents')->group(function () {
        Route::get('/edit','Admin\ContentController@index')->name('.edit');
        Route::post('/edit','Admin\ContentController@update');
    });
  });
