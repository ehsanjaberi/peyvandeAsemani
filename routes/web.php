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
*/
Route::get('/','LoginController@show')->name('show-login');
Route::post('/login','LoginController@login')->name('login');
Route::get('/logout','LoginController@logout')->name('logout');

Route::namespace('Panel')->middleware('auth')->group(function() {
    Route::get('/management','HomeController@index')->name('panel-index');
    Route::namespace('Wedding')->group(function() {
        Route::get('/wedding','WeddingController@show')->name('show-wedding');
        Route::post('/insert-wedding','WeddingController@insert')->name('insert-wedding');
        Route::get('/getCities/{id}','WeddingController@getCities')->name('get-cities');
    });
    Route::namespace('User')->group(function() {
        Route::get('/users','UserController@show')->name('show-users');
        Route::post('/insert-user','UserController@insert')->name('insert-user');
    });
    Route::namespace('Station')->group(function() {
        Route::get('/show-station','StationController@show')->name('show-station');
        Route::post('/insert-station','StationController@insert')->name('insert-station');
        Route::get('/delete-station/{id}','StationController@delete')->name('delete-station');
        Route::get('/fetch-station/{id}','StationController@fetch')->name('fetch-station');
        Route::post('/update-station','StationController@update')->name('update-station');
    });
    Route::namespace('Helper')->group(function() {
        Route::get('/show-helpers','HelperController@show')->name('show-helper');
        Route::get('/add-helper','HelperController@insertForm')->name('add-helper');
        Route::post('/insert-helper','HelperController@insert')->name('insert-helper');
        Route::get('/delete-helper/{id}','HelperController@delete')->name('delete-helper');
        Route::get('/edit-helper/{id}','HelperController@updateForm')->name('edit-helper');
        Route::patch('/update-helper','HelperController@update')->name('update-helper');
        Route::get('/rollcall-helpers','HelperController@showRollcall')->name('show-helperRollcall');
        Route::get('/helper/present/{id}','HelperController@present')->name('present-helper');
        Route::get('/helper/absent/{id}','HelperController@absent')->name('absent-helper');
    });
    Route::namespace('Concluder')->group(function() {
        Route::get('/show-concluders','ConcluderController@show')->name('show-concluder');
        Route::get('/add-concluder','ConcluderController@insertForm')->name('add-concluder');
        Route::post('/insert-concluder','ConcluderController@insert')->name('insert-concluder');
        Route::get('/delete-concluder/{id}','ConcluderController@delete')->name('delete-concluder');
        Route::get('/edit-concluder/{id}','ConcluderController@updateForm')->name('edit-concluder');
        Route::patch('/update-concluder','ConcluderController@update')->name('update-concluder');
        Route::get('/rollcall-concluders','ConcluderController@showRollcall')->name('show-concluderRollcall');
        Route::get('/concluder/present/{id}','ConcluderController@present')->name('present-concluder');
        Route::get('/concluder/absent/{id}','ConcluderController@absent')->name('absent-concluder');
    });
});
