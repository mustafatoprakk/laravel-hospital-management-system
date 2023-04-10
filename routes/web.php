<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DateController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\HourController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
})->name('home');

Auth::routes();

// User
Route::resource("/user", UserController::class);
//Doctors
Route::resource("/doctor", DoctorController::class);
Route::post("/getDepartment", [DoctorController::class, "getDepartment"])->name("getDepartment");
Route::post("/getDoctor", [DoctorController::class, "getDoctor"])->name("getDoctor");
//Department
Route::resource("/department", DepartmentController::class);
// Hospital
Route::resource("/hospital", HospitalController::class);
// Appointment
Route::get("/appointment.index", [AppointmentController::class, "index"])->name("appointment.index");
Route::get("/appointment.create", [AppointmentController::class, "create"])->name("appointment.create");
Route::post("/appointment.store", [AppointmentController::class, "store"])->name("appointment.store");
Route::post("/getHours", [AppointmentController::class, "getHours"])->name("getHours");
//Hour
Route::resource("/hour", HourController::class);
//Date
Route::resource("/date", DateController::class);

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
