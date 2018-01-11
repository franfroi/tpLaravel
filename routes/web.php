<?php
Route::get('/', 'HomeController@index')->name('home');
Auth::routes();

Route::get('account',array(
    'as'=>'account',
    'uses'=>'Controller@account'
))->middleware('auth');;


Route::post('account-modify',array(
    'as'=>'account-modify',
    'uses'=>'Controller@accountModify'
))->middleware('auth');;





