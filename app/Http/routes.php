<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'EventsController@index');
Route::get('event/{event}', 'EventsController@view');
Route::post('event/sendreport', 'EventsController@sendreport');
Route::post('event/save', 'EventsController@save');
Route::get('admin/event/create', 'EventsController@create')->middleware('auth');
Route::post('stand/addStandVisit', 'StandsController@addStandVisit');
Route::post('stand/addDocumentDownload', 'StandsController@addDocumentDownload');
Route::get('stand/reserve/{stand}', 'StandsController@reserve');
Route::get('stand/showall/{event}', 'StandsController@showall');
Route::get('reserve/{event}/{stand}', 'Auth\AuthController@reserve');
Route::post('files', 'CompanyDocumentController@addDocument');
Route::auth();