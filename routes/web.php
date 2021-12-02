<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
Route::get('test/{id}' , 'TestController@generate');

Route::get('index' , 'MainController@index')->middleware('login');
 Route::get('buttons' , 'MainController@index2');


 Route::get('teacher/create' , 'TeacherController@create');
 Route::get('teacher', 'TeacherController@index');
 Route::post('teacher/store', 'TeacherController@store');
 Route::get('teacher/edit/{id}', 'TeacherController@edit');
 Route::post('teacher/update/{id}', 'TeacherController@update');
 Route::post('teacher/delete/{id}', 'TeacherController@destroy');
 Route::get('teacher/details/{id}', 'TeacherController@details');

 Route::get('student/create' , 'StudentController@create');
 Route::get('student', 'StudentController@index');
 Route::post('student/store' , 'StudentController@store');
 Route::get('student/edit/{id}' , 'StudentController@edit');
 Route::post('student/update/{id}' , 'StudentController@update');
 Route::post('student/delete/{id}' , 'StudentController@destroy');
 Route::get('student/details/{id}' , 'StudentController@details');


 Route::get('section/create' , 'SectionController@create');
 Route::get('section', 'SectionController@index');
 Route::post('section/store', 'SectionController@store');
 Route::get('section/edit/{id}', 'SectionController@edit');
 Route::post('section/update/{id}', 'SectionController@update');
 Route::post('section/delete/{id}', 'SectionController@destroy');
 Route::get('section/cancel', 'SectionController@cancel');
 Route::get('section/details/{id}' , 'SectionController@details');

Route::post('category/store' , 'Dashboard\CategoryController@store');
Route::get('category/create' , 'Dashboard\CategoryController@create');
