<?php
// Route::get('user','UserController@index');
// Route::post('user','UserController@store');
Route::get('sms','MessageController@index');
Route::post('sms','MessageController@message');
Route::get('smss','MessageController@send');
Route::get('upload', 'BudgetController@showForm');
Route::post('upload', 'BudgetController@store');