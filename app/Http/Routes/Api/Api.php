<?php

/**
 * Frontend Controllers
 */
Route::get('/', 'ApiController@index');
Route::get('/questions', 'ApiController@questionsByCategory');
Route::get('/results', 'ApiController@votesByQuestion');

Route::group(['middleware' => 'vote'], function() {
	Route::post('/vote','ApiController@registerVote');
});
