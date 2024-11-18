<?php

use App\Http\Controllers\Admin\MajorController as AdminMajorController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\DoctorController;
use App\Http\Controllers\Front\HomeController;


use App\Http\Controllers\Front\MajorController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/doctors', [DoctorController::class, 'index']);
Route::get('/majors', [MajorController::class, 'index']);





Route::get('/contact', [ContactController::class, 'index']);
Route::post('/send-message', [ContactController::class, 'sendMessage']);

require_once 'Admin.php';







