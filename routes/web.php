<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('users', 'UserController');
Route::post('users/addToProject', 'UserController@addUserToProject');
Route::post('users/addToActivity', 'UserController@addUserToActivity');
Route::get('users/{user}/activities', 'UserController@getActivitiesFromUserAsParticipant');
Route::get('users/{user}/incidents', 'UserController@getIncidentFromUser');
Route::resource('activities', 'ActivityController');
Route::resource('incidents', 'IncidentController');
Route::resource('projects', 'ProjectController');
Route::get('projects/{project}/activities', 'ProjectController@getActivitiesFromProject');
Route::get('projects/{project}/participants', 'ProjectController@getParticipantsFromProject');