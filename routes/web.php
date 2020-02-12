<?php

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')
    ->middleware(['auth', 'can:list-role'])->group(function () {
        Route::get('/', 'DashController@index');
        Route::resource('/users', 'UserController', ['except' => ['create', 'store']]);
        Route::resource('/roles', 'RoleController');
    });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('profile', 'CurriculumController')->except(['show']);

Route::resource('skills', 'SkillsController')->except(['show', 'edit', 'update']);

Route::resource('experience', 'ExperienceController')->except(['show', 'edit', 'update']);

Route::resource('project', 'ProjectController')->except(['show', 'edit', 'update']);
Route::resource('training', 'TrainingController')->except(['show', 'edit', 'update']);
