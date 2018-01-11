<?php


Route::get('modifyUser',array(
    'as'=>'modifyUser',
    'uses'=>'Controller@modifyUser'
));
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


