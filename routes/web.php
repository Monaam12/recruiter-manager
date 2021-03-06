<?php

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')
    ->middleware(['auth', 'can:list-role'])->group(function () {
        Route::get('/', 'DashController@index');
        Route::resource('/users', 'UserController')->except(['create', 'store', 'show']);
        Route::resource('/roles', 'RoleController');
        Route::resource('/profile', 'ProfileUserController')->except(['create', 'store', 'edit', 'update', 'destroy']);
    });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
    Route::resource('profile', 'CurriculumController')->except(['show']);
    Route::resource('skills', 'SkillsController')->except(['show', 'edit', 'update']);
    Route::resource('experience', 'ExperienceController')->except(['show', 'edit', 'update']);
    Route::resource('project', 'ProjectController')->except(['show', 'edit', 'update']);
    Route::resource('training', 'TrainingController')->except(['show', 'edit', 'update']);
});
