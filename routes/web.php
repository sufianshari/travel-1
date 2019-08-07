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

Route::get('/', function(){
    ini_set('display_errors', 1);
    restore_error_handler();
    phpinfo();
    echo $foo;

});
*/
Route::get('/', 'BaseController@getIndex')->middleware('cookie');
Route::get('news/','NewsController@getAll');
Route::get('news/{id}','NewsController@getOne');
Route::get('search','SearchController@getIndex');
Route::post('search/ajax', 'SearchController@postAjax');
Auth::routes();

Route::get('ajax', 'AjaxController@getNews');
Route::get('ajax/info', 'AjaxController@getInfo');
Route::post('ajax/cabinet', 'AjaxController@getCabinet');
Route::get('ajax/cities', 'AjaxController@getCities');
Route::get('ajax/video', 'AjaxController@getVideo');

Route::post('cabinet','CabinetController@postIndex');
Route::get('home', 'HomeController@index')->name('home');
Route::get('city/{id}','CityController@getCity');
Route::get('/cabinet', 'CabinetController@getIndex');
Route::get('{url}', 'CountryController@getIndex')->where('url', '[A-Za-z]{2}');
Route::get('{url}/{name}', 'CountryController@getName')->where('url', '[A-Za-z]{2,3}')->middleware('cookie');

//parser
Route::get('/parser/hotels','HotelController@getXml');