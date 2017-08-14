

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

// Route::get('/', function () {
//     return view('index');
// });

$app->group(['prefix' => 'api'], function($app){
	$app->get('/posts', 'ExampleController@post');
	$app->get('/comments', 'ExampleController@comments');
	$app->post('/post/create', 'ExampleController@storePost');
	$app->get('/count/post', 'ExampleController@countPost');
	$app->post('/comment/create', 'ExampleController@saveComment');
	$app->post('/post/edit', 'ExampleController@editPost');
});
// Route