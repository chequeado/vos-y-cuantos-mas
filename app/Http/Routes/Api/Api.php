<?php

/**
 * Frontend Controllers
 */
Route::get('/', 'ApiController@index');
Route::get('/questions/{idCategoria}', 'ApiController@questionsByCategory');
