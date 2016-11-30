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



/*Competitions*/
Route::get('/competitions','CompetitionController@getAllCompetitions');

Route::post('/user/{userId}/competitions','CompetitionController@createCompetitionBoard');

Route::post('/competitions/{competitionId}/users/{userId}','CompetitionController@joinCompetition');

Route::delete('/competitions/{competitionId}/users/{userId}','CompetitionController@quitCompetition');


/*My-Competitions*/
Route::get('/user/{userId}/competitions','CompetitionController@getCompetitionsByUserId');

Route::post('/user/{userId}/competitions','CompetitionController@createCompetitionMine');

Route::delete('/competitions/{competitionId}','CompetitionController@deleteCompetition');