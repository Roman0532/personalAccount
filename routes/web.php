<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');

// Registration Routes...


Route::get('/logout', function () {
    Auth::logout();
    return redirect()->back();
});

Route::match(['post', 'get'], '/index', function () {
    return view('index');
});

Route::match(['post', 'get'], '/news', function () {
    return view('news');
});

Route::match(['post', 'get'], '/prezent', function () {
    return view('prezent');
});

Route::match(['post', 'get'], '/workers', function () {
    return view('workers');
});

Route::match(['post', 'get'], '/documents', function () {
    return view('documents');
});

Route::match(['post', 'get'], '/materials', "AdminController@getAllTeachers");

Route::match(['post', 'get'], '/doc', "AdminController@uploadDocuments");

Route::match(['post', 'get'], '/delete', "AdminController@deleteDocument")->name('delete');

Route::match(['post', 'get'], '/create', "AdminController@createDocuments");

Route::match(['post', 'get'], '/deleteAll', "AdminController@deleteAllDocuments");

Route::get('/teacher/{page}', "AdminController@getAllDocuments");

Route::middleware(['isAdmin'])->group(function () {
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');
    Route::get('/adminpanel', "AdminController@showAdminPanel");
    Route::post('/teacher/delete', "AdminController@deleteTeacher");
    Route::post('/discipline/delete', "AdminController@deleteDiscipline");
    Route::post('/discipline/add', "AdminController@addDiscipline");
});
