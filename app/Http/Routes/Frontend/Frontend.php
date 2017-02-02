<?php

/**
 * Frontend Controllers
 */
Route::get('/', 'FrontendController@index')->name('frontend.index');
Route::get('/app', 'FrontendController@app')->name('frontend.app');
Route::get('/summary', 'FrontendController@summary')->name('frontend.summary');
Route::get('/questions/{id}', 'QuestionController@view')->name('frontend.question.view');
/*Route::get('macros', 'FrontendController@macros')->name('frontend.macros');*/

/**
 * These frontend controllers require the user to be logged in
 */
Route::group(['middleware' => 'auth'], function () {
    Route::group(['namespace' => 'User'], function() {
        Route::get('dashboard', 'DashboardController@index')->name('frontend.user.dashboard');
        Route::get('profile/edit', 'ProfileController@edit')->name('frontend.user.profile.edit');
        Route::patch('profile/update', 'ProfileController@update')->name('frontend.user.profile.update');
    });
});