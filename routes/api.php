<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TrackeController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//admin
Route::get('/admins',"AdminController@index");
Route::get('/admins/{id}',"AdminController@show");
//courses
Route::get('/courses',"CourseController@index");
Route::get('/courses/{id}',"CourseController@show");
//levels
Route::get('/levels',"LevelController@index");
Route::get('/levels/{id}',"LevelController@show");
//Ratings
Route::get('/ratings',"RatingController@index");
Route::get('/ratings/{id}',"RatingController@show");
//Students
Route::get('/students',"StudentController@index");
Route::get('/students/{id}',"StudentController@show");
//Trackes
Route::get('/trackes',"TrackeController@index");
Route::get('/trackes/{id}',"TrackeController@show");
//register admin
Route::post('register',"AuthController@register");
//login admin
Route::post('login',"AuthController@login");

//close
Route::group(['middleware'=>["auth:sanctun"]],function(){
    //admins
    Route::post('/admins',"AdminController@store");
    Route::put('/admins/{id}',"AdminController@update");
    Route::delete('/admins/{id}',"AdminController@destroy");
    //courses
    Route::post('/courses',"CourseController@store");
    Route::put('/courses/{id}',"CourseController@update");
    Route::delete('/courses/{id}',"CourseController@destroy");
    //levels
    Route::post('/levels',"LevelController@store");
    Route::put('/levels/{id}',"LevelController@update");
    Route::delete('/levels/{id}',"LevelController@destroy");
    //Ratings
    Route::post('/ratings',"RatingController@store");
    Route::put('/ratings/{id}',"RatingController@update");
    Route::delete('/ratings/{id}',"RatingController@destroy");
    //Students
    Route::post('/students',"StudentController@store");
    Route::put('/students/{id}',"StudentController@update");
    Route::delete('/students/{id}',"StudentController@destroy");
    //Trackes
    Route::post('/trackes',"TrackeController@store");
    Route::put('/trackes/{id}',"TrackeController@update");
    Route::delete('/trackes/{id}',"TrackeController@destroy");
    //logout admin
    Route::post('logout',"AuthController@logout");
});
