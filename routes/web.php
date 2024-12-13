<?php

use App\Http\Controllers\Front\AppointmentController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\DoctorController;
use App\Http\Controllers\Front\HomeController;


use App\Http\Controllers\Front\MajorController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/doctors', [DoctorController::class, 'index']);
Route::get('/majors', [MajorController::class, 'index']);
Route::get('/majors/{major}', [MajorController::class, 'doctors'])->name('doctors');


Route::get('/contact', [ContactController::class, 'index']);
Route::post('/send-message', [ContactController::class, 'sendMessage']);

Route::middleware('auth')->group(function () {
Route::get('/appointments{id}', [AppointmentController::class, 'index'])->name('appointments.index');
Route::post('/booking{user}', [AppointmentController::class, 'book'])->name('appointments.booking');
});




require_once 'Admin.php';

require_once 'Auth.php';








