<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources(['user'=>'API\UserController']);
Route::get('findUser', 'API\UserController@search');
Route::get('groupList', 'API\UserController@groupList');
Route::get('roleList', 'API\UserController@roleList');
Route::get('countyList', 'API\RegionController@county');
Route::get('typeList', 'API\RegionController@type');
Route::get('centerList/{county_id}/{type_id}', 'API\RegionController@center');
Route::get('pointList/{center_id}', 'API\RegionController@point');

Route::post('county', 'API\RegionController@addCounty');
Route::put('county/{id}', 'API\RegionController@updateCounty');
Route::get('county/{county_id}', 'API\RegionController@countyById');
Route::delete('county/{county_id}', 'API\RegionController@deleteCounty');

Route::get('center/county/{county_id}', 'API\RegionController@centerByCountyId');
Route::get('center/type/{type_id}', 'API\RegionController@centerByTypeId');
Route::get('point/center/{center_id}', 'API\RegionController@pointByCenterId');

Route::post('type', 'API\RegionController@addType');
Route::get('type/{type_id}', 'API\RegionController@typeById');
Route::put('type/{id}', 'API\RegionController@updateType');
Route::delete('type/{type_id}', 'API\RegionController@deleteType');

Route::post('center', 'API\RegionController@addCenter');
Route::get('center/{center_id}', 'API\RegionController@centerById');
Route::put('center/{id}', 'API\RegionController@updateCenter');
Route::delete('center/{center_id}', 'API\RegionController@deleteCenter');

Route::post('point', 'API\RegionController@addPoint');
Route::get('point/{point_id}', 'API\RegionController@pointById');
Route::put('point/{id}', 'API\RegionController@updatePoint');
Route::delete('point/{point_id}', 'API\RegionController@deletePoint');

Route::get('tempListByCounty/', 'API\ColdChainController@temp');
Route::get('freezeye', 'API\DeviceFreezEye@index');

Route::get('tempListByCounty/{county_id}', 'API\ColdChainController@tempByCounty');

