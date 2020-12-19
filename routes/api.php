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
Route::get('users/online', 'API\UserController@userOnlineStatus');
Route::get('groupList', 'API\UserController@groupList');
Route::get('roleList', 'API\UserController@roleList');
Route::get('countyList', 'API\RegionController@county');
Route::get('typeList', 'API\RegionController@type');
Route::get('centerList/{county_id}/{type_id}', 'API\RegionController@center');
Route::get('pointList/{center_id}/{type_id}', 'API\RegionController@point');

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

Route::put('changePassword', 'API\UserController@changePassword');

Route::get('environment/itemList', 'API\EnvironmentController@itemList');
Route::get('environment/valueList', 'API\EnvironmentController@paginateByCounty');
Route::post('environment/value', 'API\EnvironmentController@addValue');
Route::put('environment/value/{id}', 'API\EnvironmentController@updateValue');
Route::delete('environment/value/{id}', 'API\EnvironmentController@deleteValue');
Route::get('environment/ListByCounty/{county_id}/{date_from}/{date_to}', 'API\EnvironmentController@environmentByCounty');
Route::get('environment/ListByCounty//{date_from}/{date_to}', 'API\EnvironmentController@environment');
Route::get('environment/report/{county_id}/{date_from}/{date_to}/{point_type}/{environment_item_id}/{covered}/{piping}', 'API\EnvironmentController@report');
Route::get('/environment/base/{point_id}', 'API\EnvironmentController@environment_base');
Route::put('/environment/base/{point_id}', 'API\EnvironmentController@updateEnvironmentBase');
Route::post('/environment/base', 'API\EnvironmentController@storeEnvironment_base');

Route::post('/cd/corona/', 'API\CdController@addCorona');
Route::put('/cd/corona/{id}', 'API\CdController@updateCorona');
Route::get('/cd/corona/ListByCounty/{date_from}/{date_to}/{county_id}/{related}', 'API\CdController@coronaByCounty');
Route::get('/cd/corona/ListByCountyLite/{county_id}', 'API\CdController@coronaByCountyLite');
//Route::get('/cd/corona/ListByCounty/{date_from}/{date_to}', 'API\CdController@corona');
Route::get('/cd/corona/ListByCountyLite/', 'API\CdController@coronaLite');
Route::get('/cd/corona/PaginateByCounty/', 'API\CdController@paginateByCounty');
Route::delete('/cd/corona/{id}', 'API\CdController@deleteValue');
Route::get('/cd/corona/StatByCounty/{county_id}', 'API\CdController@statByCounty');
Route::get('/cd/corona/StatByPoint/{point_id}/{type_id}/{center_id}/{county_id}', 'API\CdController@statByPoint');
Route::get('/cd/corona/StatByCounty', 'API\CdController@stat');
Route::get('/cd/corona/expose/{national_code}', 'API\CdController@expose');
Route::get('/cd/corona/findValue', 'API\CdController@search');
Route::get('/cd/corona/report/{county_id}/{date_from}/{date_to}/{date_from_diagnosis}/{date_to_diagnosis}/{date_from_status}/{date_to_status}/{date_from_birth}/{date_to_birth}/{point_type}/{diagnosis}/{situation}/{hospitalization}/{sex}', 'API\CdController@report');

Route::get('/cd/corona/chart', 'API\CdController@chart');
Route::get('/cd/corona/newCasePerDay', 'API\CdController@chart_NewCasePerDay');
Route::get('/cd/corona/newCasePerDiagnosis/{county_id}', 'API\CdController@chart_newCasePerDiagnosis');
Route::get('/cd/corona/newCasePerDiagnosis', 'API\CdController@chart_newCasePerDiagnosis');

Route::get('/region/pointByCounty/{county_id}', 'API\RegionController@pointByCounty');
Route::get('/region/pointByCounty', 'API\RegionController@pointList');

Route::get('/develop/{point_id}', 'API\DevelopController@develop');
Route::put('/develop/{point_id}', 'API\DevelopController@updateDevelop');
Route::post('develop', 'API\DevelopController@store');

Route::get('/cd/thyroid/ListByCounty/{county_id}', 'API\CdThyroidController@thyroidByCounty');
Route::get('/cd/thyroid/ListByCounty/', 'API\CdThyroidController@thyroid');

Route::post('/cd/thyroid/', 'API\CdThyroidController@addThyroid');
Route::put('/cd/thyroid/{id}', 'API\CdThyroidController@updateThyroid');
Route::get('/cd/thyroid/ListByCounty/{county_id}', 'API\CdThyroidController@thyroidByCounty');
Route::get('/cd/thyroid/ListByCounty/', 'API\CdThyroidController@thyroid');
Route::get('/cd/thyroid/PaginateByCounty/', 'API\CdThyroidController@paginateByCounty');
Route::delete('/cd/thyroid/{id}', 'API\CdThyroidController@deleteValue');
Route::get('/cd/thyroid/findValue', 'API\CdThyroidController@search');

Route::get('/cd/finil/ListByCounty/{county_id}', 'API\CdFinilController@finilByCounty');
Route::get('/cd/finil/ListByCounty/', 'API\CdFinilController@finil');

Route::post('/cd/finil/', 'API\CdFinilController@addFinil');
Route::put('/cd/finil/{id}', 'API\CdFinilController@updateFinil');
Route::get('/cd/finil/ListByCounty/{county_id}', 'API\CdFinilController@finilByCounty');
Route::get('/cd/finil/ListByCounty/', 'API\CdFinilController@finil');
Route::get('/cd/finil/PaginateByCounty/', 'API\CdFinilController@paginateByCounty');
Route::delete('/cd/finil/{id}', 'API\CdFinilController@deleteValue');
Route::get('/cd/finil/findValue', 'API\CdFinilController@search');

Route::get('/cd/cancer/ListByCounty/{county_id}', 'API\CdFinilController@cancerByCounty');
Route::get('/cd/cancer/ListByCounty/', 'API\CdFinilController@cancer');

Route::post('/cd/cancer/', 'API\CdCancerController@addCancer');
Route::put('/cd/cancer/{id}', 'API\CdCancerController@updateCancer');
Route::get('/cd/cancer/ListByCounty/{county_id}', 'API\CdCancerController@cancerByCounty');
Route::get('/cd/cancer/ListByCounty/', 'API\CdCancerController@cancer');
Route::get('/cd/cancer/PaginateByCounty/', 'API\CdCancerController@paginateByCounty');
Route::delete('/cd/cancer/{id}', 'API\CdCancerController@deleteValue');
Route::get('/cd/cancer/findValue', 'API\CdCancerController@search');
Route::get('/cd/cancer/typeList', 'API\CdCancerController@cancerType');

Route::post('/cd/disease/', 'API\CdDiseaseController@addDisease');
Route::put('/cd/disease/{id}', 'API\CdDiseaseController@updateDisease');
Route::get('/cd/disease/ListByCounty/{county_id}/{date_from}/{date_to}', 'API\CdDiseaseController@diseaseByCounty');
Route::get('/cd/disease/ListByCounty//{date_from}/{date_to}', 'API\CdDiseaseController@disease');
Route::get('/cd/disease/PaginateByCounty/', 'API\CdDiseaseController@paginateByCounty');
Route::delete('/cd/disease/{id}', 'API\CdDiseaseController@deleteValue');
Route::get('/cd/disease/findValue', 'API\CdDiseaseController@search');
Route::get('/cd/disease/typeList', 'API\CdDiseaseController@diseaseType');
