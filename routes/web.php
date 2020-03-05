<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use BBS\test\yudai\work\Login\Login;
use BBS\test\yudai\work\Post\Post;
use BBS\test\yudai\work\Frontpage\Frontpage;
use BBS\test\yudai\work\Delete\Delete;



Route::get('/input', 'BBSController@input');

Route::get('/list', 'BBSController@list_get');

Route::post('/list', 'BBSController@list_post');

Route::get('/login_page', 'BBSController@login_page');

Route::post('/login', 'BBSController@login');

Route::get('/login_failed', 'BBSController@login_failed');

Route::get('/logout', 'BBSController@logout');

Route::post('/save', 'BBSController@save');

Route::post('/delete', 'BBSController@delete');

Route::get('/contents', 'BBSController@contents');