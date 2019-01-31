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

Route::get('/', 'FormController@index');

Auth::routes();
//회원가입, 로그인, 로그인체크 등의 기능을 사용할 수 있게 해줌

Route::get('/home', 'HomeController@index')->name('home');
//http://localhost/home과 같이 접근했을 때 HomeController의 index 메서드를 실행하도록 한다.

Route::get('/form', 'FormController@create');
Route::post('/form', 'FormController@store');
Route::delete('/form', 'FormController@destroy');