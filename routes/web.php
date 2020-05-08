<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','Frontend\PageController@index')->name('main-page');

Route::get('news/{category_name}/{id}','Frontend\PageController@category')->name('category');
Route::get('news-details/{name}/{id}','Frontend\PageController@NewsDetails')->name('news-details');

Route::get('/contact-us','Frontend\PageController@contact')->name('contact-us');
Route::post('/contact-us','Frontend\PageController@contactMessage');

Route::get('/advertise-with-us','Frontend\PageController@Advertisement')->name('advertisement');
Route::post('/advertise-with-us','Frontend\PageController@AdvertisementRequest');

Route::post('/subscribe','Frontend\PageController@subscribe')->name('subscribe');

Route::post('/comment/{id}','Frontend\PageController@comment')->name('comment');

Route::get('/about-us','Frontend\PageController@about')->name('about-us');

Route::any('/search','Frontend\SearchController@index')->name('search');

Route::get('/logout',function (){
    if(Auth::check()):
        Auth::logout();
        return redirect()->route('login')->with("success","Successfully! Logged Out");
    endif;
    return redirect()->back()->with("error","Only for logged user access!");
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
