<?php
Route::get('/', 'HomeController@index')->name('home');
Auth::routes();

Route::get('account',array(
    'as'=>'account',
    'uses'=>'Controller@account'
))->middleware('auth');


Route::post('account-modify',array(
    'as'=>'account-modify',
    'uses'=>'Controller@accountModify'
))->middleware('auth');

Route::get('/',array(
    'as'=>'home',
    'uses'=>'Controller@showWallet'
))->middleware('auth');


// form
Route::get('/transfer',array(
    'as'=> 'transfer',
    'uses'=>'Controller@transfer'
))->middleware('auth');

// // post
Route::post('/set-transfer',array(
    'as'=> 'set-transfer',
    'uses'=>'Controller@setTransfer'
))->middleware('auth');




