<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::group(['middleware' => 'can:create student'], function (){
        Route::crud('student', 'StudentCrudController');
        Route::get('student/{id}/generate', 'StudentCrudController@generate');
        Route::get('student/{id}/promote', 'StudentCrudController@promote');
    });

    Route::group(['middleware' => 'can:student_class'], function (){
        Route::crud('student_class', 'Student_classCrudController');
    });
    Route::group(['middleware' => 'can:fees'], function (){
        Route::crud('fee', 'FeeCrudController');
        Route::get('fee/{id}/payment', 'FeeCrudController@payment');
        Route::get('fee/{id}/invoice', 'FeeCrudController@invoice');
    });
    Route::group(['middleware' => 'can:vocationaltraining'], function (){
        Route::crud('vocationaltraining', 'VocationalTrainingCrudController');
    });

    Route::group(['middleware' => 'can:courses'], function (){
        Route::crud('course', 'CourseCrudController');
    });
    Route::group(['middleware' => 'can:teachers'], function (){
        Route::crud('teacher', 'TeacherCrudController');
    });

    Route::group(['middleware' => 'can:checkups'], function (){
        Route::crud('checkup', 'CheckupCrudController');
    });

    Route::group(['middleware' => 'can:medicals'], function () {
        Route::crud('medical', 'MedicalCrudController');
    });
    Route::group(['middleware' => 'can:categories'], function () {
        Route::crud('category', 'CategoryCrudController');
    });
    Route::group(['middleware' => 'can:items'], function () {
        Route::crud('item', 'ItemCrudController');
    });
}); // this should be the absolute last line of this file
