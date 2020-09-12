<?php

Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function() {

  Route::post('register' , 'RegisterController');
  Route::post('login' , 'LoginController');
  Route::middleware('auth:api')->post('logout' , 'LogoutController');

});

Route::group([
    'middleware' => 'auth:api',
    'prefix' => 'todo',
    'namespace' => 'Api',
], function () {

  Route::get('/' , 'TodoController@index');
  Route::post('/create-new-todo-list' , 'TodoController@store');
  Route::post('/change-done-status/{$id}' , 'TodoController@changeDoneStatus');
  Route::delete('/delete/{$id}' , 'TodoController@delete');

});
