<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MajorController;
use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\AppointmentController;

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

Route::middleware('auth:sanctum')->get('v1/user', function (Request $request) {
    return $request->user();
});


Route::post('v1/register', [AuthController::class, 'register']);


Route::post('v1/login', [AuthController::class, 'login']);


Route::post('v1/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');


////////////////////////////////////////////

Route::get('v1/majors', [MajorController::class, 'index']);

Route::get('v1/majors/{id}', [MajorController::class, 'show']);

Route::get('v1/majors/{id}/doctors', [MajorController::class, 'doctors']);

///////////////////////////////////////////////////

Route::get('v1/doctors', [DoctorController::class, 'index']);





Route::middleware('auth:sanctum')->group(function () {
    Route::get('v1/doctor/{id}', [AppointmentController::class, 'showDoctor']);
    Route::post('v1/doctor/{id}/appointments', [AppointmentController::class, 'store']);
    Route::get('v1/my-appointments', [AppointmentController::class, 'myAppointments']);
});



