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

/*Login*/

Route::get('/', function (){
    return view('login');
});

Route::get('/login', function (){
    return view('login');
});

Route::post('/login','LoginController@postLogin');


/*Related-Moments*/

Route::get('/user/{userId}/related-moments','MomentController@getRelatedMoments');

Route::post('/user/{userId}/related-moments','MomentController@createMomentBoard');

/*My-Moments*/
Route::get('/user/{userId}/moments','MomentController@getMyMoments');

Route::post('/user/{userId}/moments','MomentController@createMomentMine');

Route::delete('user/{userId}/moments/{momentId}','MomentController@deleteMoment');



/*Competitions-Board*/
Route::get('/competitions','CompetitionController@getAllCmpts');

/*My-Competitions*/
Route::get('/user/{userId}/competitions','CompetitionController@getCompetitionsByUserId');
Route::delete('/competitions/{competitionId}','CompetitionController@deleteCompetition');

/*Competitions-Common*/
Route::post('/user/{userId}/competitions','CompetitionController@createCmpt');
Route::post('/competitions/{competitionId}/{userId}','CompetitionController@joinIdvCmpt');
Route::post('/competitions/{competitionId}/{userId}/{team}','CompetitionController@joinTeamCmpt');
Route::delete('/competitions/{competitionId}/{userId}','CompetitionController@quitCmpt');

/*User-Profile*/
Route::get('/user/{userId}/userInfo','UserInfoController@getUserInfo');
Route::post('/user/{userId}/userInfo','UserInfoController@updateUserInfo');

/*User-Record*/
Route::get('/user/{userId}/deviceRecords/default','DeviceRecordController@getDeviceRecord');
Route::get('/user/{userId}/deviceRecords/{date}','DeviceRecordController@getDeviceRecordByDate');
Route::put('/user/{userId}/deviceRecords/{date}','DeviceRecordController@getRecordAjax');

/*User-Statistics*/
Route::get('/user/{userId}/statistics','UserStatsController@getUserStats');


/*User-Friends*/
Route::get('/user/{userId}/friends','UserFriendController@getUserFriends');
Route::get('/search','UserFriendController@search');

Route::post('/user/{userId}/watch/{watchId}','UserFriendController@follow');
Route::delete('/user/{userId}/watch/{watchId}','UserFriendController@unfollow');


