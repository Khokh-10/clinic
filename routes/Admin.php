<?php

use App\Http\Controllers\Admin\AdminMajorController;

Route::get('majors.add', [AdminMajorController::class, 'create'])->name('majors.add');


Route::post('majors', [AdminMajorController::class, 'store']);
