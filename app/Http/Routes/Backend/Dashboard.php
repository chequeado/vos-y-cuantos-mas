<?php

Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
Route::get('stats', 'StatsController@index')->name('admin.stats');