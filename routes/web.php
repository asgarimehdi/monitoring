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
Route::get('/', 'HomeController@cdcoronalite');

Route::get('/users', 'HomeController@users');
Route::get('/regions', 'HomeController@region');
Route::get('/coldchain', 'HomeController@coldchain');
Route::get('/changepassword', 'HomeController@changepassword');
Route::get('/draggablemap', 'HomeController@draggablemap');
Route::get('/environmentmanage', 'HomeController@environmentmanage');
Route::get('/environment', 'HomeController@environment');
Route::get('/cdcoronamanage', 'HomeController@cdcoronamanage');
Route::get('/cdcorona', 'HomeController@cdcorona');
Route::get('/cdcoronalite', 'HomeController@cdcoronalite');
Route::get('/report/cdcorona', 'HomeController@report_cdcorona');
Route::get('/report/environment', 'HomeController@report_environment');
Route::get('/developmanage', 'HomeController@developmanage');
Route::get('/cdthyroid', 'HomeController@cd_thyroid');
Route::get('/cdthyroidmanage', 'HomeController@cdthyroidmanage');
Route::get('/cdfinil', 'HomeController@cd_finil');
Route::get('/cdfinilmanage', 'HomeController@cdfinilmanage');
Route::get('/cdcancer', 'HomeController@cd_cancer');
Route::get('/cdcancermanage', 'HomeController@cdcancermanage');
Route::get('/cddisease', 'HomeController@cd_disease');
Route::get('/cddiseasemanage', 'HomeController@cddiseasemanage');
