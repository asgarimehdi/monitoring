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


//Auth::routes();
Auth::routes(['register' => false,'reset' => false]);
Route::get('/', 'HomeController@cdcorona');

Route::get('/users', 'HomeController@users');
Route::get('/regions', 'HomeController@region');
Route::get('/coldchain', 'HomeController@coldchain');
Route::get('/changepassword', 'HomeController@changepassword');
Route::get('/draggablemap', 'HomeController@draggablemap');
Route::get('/environmentmanage', 'HomeController@environmentmanage');
Route::get('/cdcoronamanage', 'HomeController@cdcoronamanage');
Route::get('/cdcorona', 'HomeController@cdcorona');
Route::get('/report/cdcorona', 'HomeController@report_cdcorona');
Route::get('/developmanage', 'HomeController@developmanage');
