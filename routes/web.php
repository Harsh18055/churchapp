<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Admin\LoginController;

use App\Http\Controllers\Admin\ChurchController;

use App\Http\Controllers\Admin\Announcementscontroller;

use App\Http\Controllers\Admin\Schedulecontroller;

use App\Http\Controllers\Admin\MassController;

use App\Http\Controllers\Admin\ViewDashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/logo', function () {
//     return view('logo');
// });

Route::get('/',[LoginController::class,'logo']);

Route::get('admin',[ViewDashboardController::class,'index']);
Route::post('admin/auth',[ViewDashboardController::class,'auth'])->name('admin.auth');
Route::group(['middleware'=>'admin_auth'],function(){
Route::get('admin/view',[ViewDashboardController::class,'show']);


//User Register
Route::get('register',[UserController::class,'show']);
Route::post('register',[UserController::class,'adddata'])->name('register');

Route::get('admin/users',[AdminController::class,'users']);







//Admin view:
Route::get('admin/admins',[AdminController::class,'show']);
Route::get('admin/manage_admin',[AdminController::class,'manage_admin']);
Route::get('admin/manage_admin/{id}',[AdminController::class,'manage_admin']);
Route::post('create',[AdminController::class,'create'])->name('create.admins');
Route::get('admin/admindelete/{id}',[AdminController::class,'admindelete']);

//Church View:-
Route::get('admin/church',[ChurchController::class,'index']);
Route::get('admin/manage_church',[ChurchController::class,'show']);
Route::get('admin/manage_church/{id}',[ChurchController::class,'show']);
Route::post('admin/manage_church_prosess',[ChurchController::class,'process'])->name('admin.process');
Route::get('admin/churchdelete/{id}',[ChurchController::class,'churchdelete']);

//Announcements View:-
Route::get('admin/announcements',[Announcementscontroller::class,'index']);
Route::get('admin/manage_announcements',[Announcementscontroller::class,'show']);
Route::get('admin/manage_announcements/{id}',[Announcementscontroller::class,'show']);
Route::post('admin/manage_process',[Announcementscontroller::class,'mange_process'])->name('admin.manage_announcements');
Route::get('admin/announcementsdelete/{id}',[Announcementscontroller::class,'announcementsdelete']);

//Schedule View:-
Route::get('admin/schedule',[Schedulecontroller::class,'index']);
Route::get('admin/manage_schedule',[Schedulecontroller::class,'show']);
Route::get('admin/manage_schedule/{id}',[Schedulecontroller::class,'show']);
Route::post('admin/manage_schedule_process',[Schedulecontroller::class,'manage_process'])->name('admin.manage_schedule');
Route::get('admin/scheduledelete/{id}',[Schedulecontroller::class,'scheduledelete']);

// Mass View:-
Route::get('admin/mass',[MassController::class,'index']);
Route::get('admin/mangemass',[MassController::class,'massinternation']);
Route::get('admin/mangemass/{id}',[MassController::class,'massinternation']);
Route::post('admin/mass_process',[MassController::class,'manage_process'])->name('admin.manage_mass');
Route::get('admin/massdelete/{id}',[MassController::class,'massdelete']);

// Logout:
Route::get('admin/logout', function () {
    session()->forget('ADMIN_LOGIN');
    session()->forget('ADMIN_ID');
    session()->flash('error','Logout sucessfully');
    return redirect('admin');
});
});
