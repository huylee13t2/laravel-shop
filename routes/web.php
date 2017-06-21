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

use App\ProductModel;
use App\CategoryModel;
use App\CommentModel;

use App\AuthController;

// home
Route::get('/','HomeController@show');

// admin
Route::group(['prefix'=>'admin'], function(){

	Route::get('/', 'AdminController@index');

	Route::get('product/{id}/view', 'AdminController@view');

	Route::get('product/{id}/edit', 'AdminController@edit');

	Route::post('product/{id}/update', 'AdminController@update');

	Route::get('product/add-new', 'AdminController@new');

	Route::post('product/save', 'AdminController@save');

	Route::get('product/{id}/delete', 'AdminController@delete');
});

// category
Route::get('category/{id}', 'CategoryController@view');

// product
Route::group(['prefix'=>'product'], function(){
	Route::get('create', 'ProductController@viewCreate');

	Route::post('create/save', 'ProductController@create');

	Route::get('{id}', 'ProductController@view');

	Route::get('{id}/edit', 'ProductController@edit');

	Route::get('{id}/delete', 'ProductController@delete');

	Route::post('{id}/save', 'ProductController@save');

	Route::get('{id}/view-buy', 'ProductController@viewBuy');

	Route::post('{id}/buy', 'ProductController@buy');

	//  comment
	// Route::post('{id}/comment', 'CommentController@new');
});

// comment
Route::group(['prefix'=>'comment'], function(){

	Route::post('{id}/new', 'CommentController@new');

	Route::post('{id}/save', 'CommentController@save');

	Route::get('{id}/delete', 'CommentController@delete');

	Route::get('{id}/like', 'LikeCommentController@like');
});

// reply
Route::group(['prefix'=>'reply'], function(){

	Route::post('{id}/new', 'ReplyController@new');

	Route::post('{id}/save', 'ReplyController@save');

	Route::get('{id}/delete', 'ReplyController@delete');

	Route::get('{id}/like', 'LikeReplyController@like');
});

// profile
Route::group(['prefix'=>'profile'], function(){

	Route::get('{id}', 'ProfileController@view');

	Route::get('{id}/edit', 'ProfileController@edit');

	Route::post('{id}/save', 'ProfileController@save');
});

//login
Route::post('postLogin', 'AuthController@login')->name('login');

Route::get('login', 'AuthController@viewLogin');

// register
Route::get('register', 'AuthController@viewRegister');

Route::post('postRegister', 'AuthController@postRegister');

//logout
Route::get('logout', 'AuthController@logout');


Route::get('mail', function(){
	Mail::raw('Sending emails with Mailgun and Laravel is easy!', function($message)
	{
		$message->subject('Mailgun and Laravel are awesome!');
		$message->from('user123example@gmail.com', 'Shop Online - Huylee');
		$message->to('leduchuy13t2@gmail.com');
	});
});

// facebook
Route::get('/redirect', 'AuthController@redirect');

Route::get('/callback', 'AuthController@callback');

// Route::get('database', function(){
// 	Schema::create('likes_reply', function ($table) {
// 		$table->increments('id');
// 		// $table->string('content');
// 		$table->dateTime('created_at');
// 		$table->dateTime('updated_at');
// 		$table->integer('product_id')->unsigned();
// 		$table->foreign('product_id')->references('id')->on('products');
// 		$table->integer('user_id')->unsigned();
// 		$table->foreign('user_id')->references('id')->on('users');
// 		$table->integer('profile_id')->unsigned();
// 		$table->foreign('profile_id')->references('id')->on('profile');
// 		$table->integer('reply_id')->unsigned();
// 		$table->foreign('reply_id')->references('id')->on('comments');
// 	});
// 	echo "OK nhe!";
// });
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
