<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->back();
});

Route::match(['post', 'get'], '/index',  function () {

    return view('index');
});


Route::match(['post', 'get'], '/news',  function () {

    return view('news');
});

Route::match(['post', 'get'], '/materials', "AdminController@getAllTeachers");

Route::match(['post', 'get'], '/doc', "AdminController@uploadDocuments");

Route::match(['post', 'get'], '/delete', "AdminController@deleteDocument");

Route::match(['post', 'get'], '/create', "AdminController@createDocuments");

Route::match(['post', 'get'], '/deleteAll', "AdminController@deleteAllDocuments");

Route::get('/teacher/{page}', "AdminController@getAllDocuments");

//Route::get('/home', 'HomeController@index')->name('home');


