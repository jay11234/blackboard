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


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/migrate','CommandController@migrate');



Route::get('/', 'HomeController@welcome')->name('welcome');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('papers/list', 'PaperController@listInJson');
Route::get('papers/show/{id}', 'PaperController@show');


Route::get('marks/list', 'MarkController@listInJson');
Route::get('marks/show/{id}', 'MarkController@show');


Route::get('schedules/list', 'ScheduleController@listInJson');
Route::get('schedules/show/{id}', 'ScheduleController@show');


Route::get('tutors/list', 'TutorController@listInJson');
Route::get('tutors/show/{id}', 'TutorController@show');


Route::get('/security','SecurityController@getState');



Route::resource('papers','PaperController')->middleware('auth:web');
Route::resource('marks', 'MarkController')->middleware('auth:web');
Route::resource('schedules', 'ScheduleController')->middleware('auth:web');
Route::resource('tutors', 'TutorController')->middleware('auth:web');
 

Auth::routes();
 
