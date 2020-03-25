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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/add_new_project','ProjectController@add_new_project')->name('add_new_project');

Route::get('/add_new_skills','SkillController@add_new_skills')->name('add_new_skills');

Route::resource('project', 'ProjectController');

Route::resource('skill', 'SkillController');

Route::get('/test', function() {
    \Artisan::call('config:cache');
    \Artisan::call('config:cache');
});