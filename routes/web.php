<?php

Route::redirect('/', '/login');

Route::redirect('/home', '/admin');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');

    Route::resource('permissions', 'PermissionsController');

    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');

    Route::resource('roles', 'RolesController');

    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');

    Route::resource('users', 'UsersController');

    Route::delete('class/destroy', 'ClassesController@massDestroy')->name('class.massDestroy');

    Route::resource('class', 'ClassesController');

    Route::delete('subject/destroy', 'SubjectController@massDestroy')->name('subject.massDestroy');

    Route::resource('subject', 'SubjectController');

    Route::delete('student/destroy', 'StudentController@massDestroy')->name('student.massDestroy');

    Route::resource('student', 'StudentController');

    Route::delete('applicants/destroy', 'ApplicationController@massDestroy')->name('applicants.massDestroy');

    Route::resource('applicants', 'ApplicationController');

    Route::delete('section/destroy', 'SectionController@massDestroy')->name('section.massDestroy');

    Route::resource('section', 'SectionController');
});

