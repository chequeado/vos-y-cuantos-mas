<?php

/**
 * Frontend Controllers
 */
Route::get('/', 'ApiController@index');
Route::get('/questions', 'ApiController@questionsByCategory');
