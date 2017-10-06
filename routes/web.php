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

Auth::routes();

Route::get('/','CommandController@index');

//Route::get('/home', 'HomeController@index')->name('home');

/*vv Original Link vv*/
//Route::get('/login_ori','HomeController@login_ori');
//Route::get('/home_ori','HomeController@home_ori');
/*^^ Original Link ^^*/

//Route::redirect('/', '/homepage', 301);

//Route::get('/login','CommandController@home');
/*Route::get('/hello', function() {
	return "Hello Laravel";
})->middleware(CheckAge::class);*/

/*Route::get('commandview','CommandController@view');*/

/*main part*/
Route::get('homepage','CommandController@home');

Route::get('CreateCmdSet','CommandController@create');

Route::post('btCreateCmdSet','CommandController@btCreate');

Route::get('editcmdset/{id}','CommandController@edit1');

Route::post('btEditCmdSet','CommandController@btEdit');
/*
Route::get('loginpage','CommandController@login');

Route::get('forgotpage','CommandController@forgot');
*/
Route::get('btDelCmdSet/{id}','CommandController@delete');

Route::get('view','TestController@view');

Route::get('cmd/{json}','TestController@cmd');

Route::get('cmdGet/{json}','TestController@cmdGet');

Route::get('cmdPost/{json}','TestController@cmdPost');

/*หน้าล็อคอินใหม่*/
/*Route::get('newloginpage','CommandController@index');

Route::get('newforgotpage','CommandController@newforgot');

/*เพิ่มมาใหม่*/