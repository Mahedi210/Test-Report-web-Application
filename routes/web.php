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



//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/','FrontHomeController@index');




Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');

//create_category
Route::get('/ccategory', 'CategoryPageController@index')->name('category.create');
Route::post('/scategory', 'CategoryPageController@store')->name('category.store');
Route::get('/lcategory', 'CategoryPageController@list')->name('category.list');
Route::get('/ecategory/{id}', 'CategoryPageController@edit')->name('category.edit');
Route::post('/ucategory/{id}', 'CategoryPageController@update')->name('category.update');
Route::delete('/dcategory/{id}', 'CategoryPageController@destroy')->name('category.destroy');

//create_test
Route::get('/ctest', 'TestPageController@index')->name('test.create');
Route::post('/stest', 'TestPageController@store')->name('test.store');
Route::get('/ltest', 'TestPageController@list')->name('test.list');
Route::get('/etest/{id}', 'TestPageController@edit')->name('test.edit');
Route::post('/utest/{id}', 'TestPageController@update')->name('test.update');
Route::delete('/dtest/{id}', 'TestPageController@destroy')->name('test.destroy');

/*create test and category*/

Route::get('/ccat','CatPageController@index')->name('test&category.create');
Route::post('/scat','CatPageController@store')->name('test&category.store');
Route::get('/getdata',[CatPageController::class,'getdata'])->name('test&category.getdata');
Route::get('/lcat','CatPageController@list')->name('test&category.list');
Route::get('/ecat/{id}','CatPageController@edit')->name('test&category.edit');
Route::post('/ucat','CatPageController@update')->name('test&category.update');
Route::delete('/dcat/{id}','CatPageController@destroy')->name('test&category.destroy');
Route::get('/fetchdata',[\App\Http\Controllers\CatPageController::class,'fetchdata']);

/*Diagnosis*/

Route::get('/diagnosis-create','DiagnosisController@index')->name('diagnosis.create');
Route::get('/diagnosis-insert','DiagnosisController@insert')->name('diagnosis.insert');
Route::post('/diagnosis-store','DiagnosisController@store')->name('diagnosis.store');
Route::get('/diagnosis-list','DiagnosisController@list')->name('diagnosis.list');
Route::get('/diagnosis-edit/{category_id}','DiagnosisController@edit')->name('diagnosis.edit');
Route::post('/diagnosis-update','DiagnosisController@update')->name('diagnosis.update');
Route::delete('/diagnosis-delete/{id}','DiagnosisController@destroy')->name('diagnosis.destroy');
Route::get('/fetchData',[\App\Http\Controllers\DiagnosisController::class,'fetchData']);
Route::get('/report-create','DiagnosisController@reportCreate')->name('report.create');
Route::get('/report-view','DiagnosisController@reportView')->name('report.view');


//test result for test
Route::get('/create','TestResultController@index');
Route::get('/insert/{id}','TestResultController@insert')->name('testResult.insert');
Route::post('/store','TestResultController@store')->name('testResult.store');
Route::get('/list','TestResultController@list')->name('testResult.list');
Route::get('/edit/{id}','TestResultController@edit')->name('testResult.edit');
Route::post('/update/{id}','TestResultController@update')->name('testResult.update');
Route::delete('/delete/{id}','TestResultController@destroy')->name('testResult.destroy');
/*Route::get('/fetchData',[\App\Http\Controllers\DiagnosisController::class,'fetchData']);*/

//new test
Route::get('/newtest-create','NewTestController@index')->name('newtest.create');
Route::get('/newtest-insert','NewTestController@insert')->name('newtest.insert');
Route::post('/newtest-store','NewTestController@store')->name('newtest.store');


//ajaxRoute for testing

/*Route::get('/screate',[\App\Http\Controllers\StudentController::class,'index']);
Route::get('/fetchData',[\App\Http\Controllers\StudentController::class,'fetchData']);
Route::post('/screate',[\App\Http\Controllers\StudentController::class,'store']);*/
//
//Route::get('/tcreate',[\App\Http\Controllers\TeacherController::class,'index']);
//Route::get('/fetchData',[\App\Http\Controllers\TeacherController::class,'fetchData']);
//Route::post('/tcreate',[\App\Http\Controllers\TeacherController::class,'store']);

//ajaxtask

Route::get('/tacreate',[\App\Http\Controllers\TaskController::class,'index']);
Route::get('/fetch-task',[\App\Http\Controllers\TaskController::class,'fetchData']);
Route::post('/tacreate',[\App\Http\Controllers\TaskController::class,'store']);




