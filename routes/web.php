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

Route::get('/', function () {
    return view('index');
});
Route::get('list','MembersControll@getList');
Route::post('add','MembersControll@postAdd');
Route::get('edit/{id}','MembersControll@getEdit');
Route::post('edit/{id}','MembersControll@postEdit');
Route::get('delete/{id}','MembersControll@postDelete');
