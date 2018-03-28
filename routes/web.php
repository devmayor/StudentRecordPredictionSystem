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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'auth'],function(){
    Route::get('/addStudent', 'StudentController@add')->name('addStudent');

    Route::post('/post/addStudent', 'StudentController@store')->name('postStudent');

    Route::get('/addSemester', 'SemesterController@add')->name('addSemester');

    Route::post('/post/addSemester', 'SemesterController@store')->name('postSemester');

    Route::get('/addCourse', 'CourseController@add')->name('addCourse');

    Route::post('/post/addCourse', 'CourseController@store')->name('postCourse');

    Route::get('/addRecord', 'RecordController@selectCourse')->name('addRecord');

    Route::get('/addRecord/{course}', 'RecordController@add')->name('fillRecords');

    Route::post('/post/addRecord', 'RecordController@store')->name('postRecord');

    Route::get('/records', 'RecordController@records')->name('records');

    Route::get('/records/delete/{id}', 'RecordController@delete')->name('deleteRecord');

    Route::get('/records/course/{id}', 'RecordController@deleteCourse')->name('deleteCourse');

    Route::post('/predict/{student}', 'RecordController@predict')->name('predict');
});

