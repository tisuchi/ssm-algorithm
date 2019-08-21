<?php


Route::get('/', 'SSMController@index');
Route::get('/add', 'SSMController@create');
Route::post('/add', 'SSMController@store');