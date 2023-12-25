<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Api\ChurchController;
use App\Http\Controllers\Api\AnnouncementsController;
use App\Http\Controllers\Api\MassintentionsController;
use App\Http\Controllers\Api\ScheduleController;






/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('register',[RegisterController::class,'show']);
Route::get('register/{id}',[RegisterController::class,'showById']);
Route::post('adddata',[RegisterController::class,'adddata']);

//Church:-
Route::get('church',[ChurchController::class,'index']);
Route::get('church/{id}',[ChurchController::class,'showById']);

//Announcements:-
Route::get('announcements',[Announcementscontroller::class,'index']);
Route::get('announcements/{id}',[AnnouncementsController::class,'showById']);

//Mass Intentions:
Route::get('mass',[MassintentionsController::class,'index']);
Route::get('mass/{id}',[MassintentionsController::class,'showById']);

//Schedule:
Route::get('schedule',[ScheduleController::class,'index']);
Route::get('schedule/{id}',[ScheduleController::class,'showById']);



