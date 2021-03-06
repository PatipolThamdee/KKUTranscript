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
Auth::routes();
Route::group( ['middleware' => 'auth' ], function()
{
Route::get('/', 'HomeController@index');
Route::get('/getGarage', 'GetGarageController@index');
Route::get('/managedoc', 'ManageDocController@index');
Route::get('/getdocresults', 'ManageDocController@docResults');
Route::get('/reject/{refcode}', 'ManageDocController@rejectDoc');
Route::get('/allow/{refcode}', 'ManageDocController@allowDoc');
Route::get('/usageChart', 'UsageChartController@showPage');
});
Route::get('/documentInfo', 'HomeController@documentInfo');
Route::get('/moreInfo', 'HomeController@moreStudentInfo');
Route::post('/storeData', 'HomeController@userInfoStore');
Route::post('/storeData2', 'HomeController@userInfoStore2');
Route::get('/studentInfo/{code}', 'StudentInfoController@showPage');
Route::post('/transcript-toggle/', 'StudentInfoController@transcriptTG');
Route::post('/graduate-toggle/', 'StudentInfoController@graduateTG');


Route::get('/adduser','AddUserController@showPage');
Route::post('/addNewUser', 'UserManageController@addNewUser');
Route::get('/usermanage','UserManageController@showPage');

Route::get('/deleteuser/{id}','UserManageController@deleteUser');
Route::get('/ssologin', 'HomeController@ssoLogin');
Route::get('/changePassword','UserManageController@showChangePasswordForm');
Route::post('/changePassword','UserManageController@changePassword')->name('changePassword');
