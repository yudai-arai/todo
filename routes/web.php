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



Route::get('/input', 'BBSController@input_controller');

Route::get('/list', 'BBSController@list_get_controller');

Route::post('/list', 'BBSController@list_post_controller');

Route::get('/login_page', 'BBSController@login_page_controller');

Route::post('/login', 'BBSController@login_controller');

Route::get('/login_failed', 'BBSController@login_failed_controller');

Route::get('/logout', 'BBSController@logout_controller');

Route::post('/save', 'BBSController@save_controller');

Route::post('/delete', 'BBSController@delete_controller');

Route::get('/contents', 'BBSController@contents_controller');