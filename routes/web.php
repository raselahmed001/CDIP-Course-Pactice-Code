<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;


Route::get('/', function () {
    return view('welcome');
});


//best formate route
Route::namespace('App\Http\Controllers')->group(function(){
    Route::get('/home', 'HomeController@index');
    Route::get('/about-us', 'HomeController@about')->middleware('TestMiddleware');
    Route::resource('/product','ProductController');


});
Route::get('users/export/', [UserController::class, 'export']);
Route::get('/view-excel', [App\Http\Controllers\ExcelController::class, 'viewExcel']);


Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/export', [StudentController::class, 'export'])->name('students.export');

//Route::get('/about-us', [HomeController::class,'index'])->middleware('TestMiddleware');


Route::namespace('App\Http\Controllers')->group(function(){
    Route::get('contact-us', 'ContactController@contact')->name('contact');
    Route::post('/contact-save', 'ContactController@contact_insert')->name('contact-save');
    Route::post('/dashboard', 'ContactController@contact_insert')->name('contact-save');
});
