<?php


use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\AdminMajorController;



Route::prefix('admin')->group(function () {
    Route::get('admin-home', [HomeController::class, 'index'])->name('admin.home');
    Route::get('/majors', [AdminMajorController::class, 'index'])->name('majors.index');
    Route::get('majors/{id}/edit', [AdminMajorController::class, 'edit'])->name('majors.edit');
    Route::put('majors/{id}  ', [AdminMajorController::class, 'update'])->name('majors.update');
    Route::get('/majors/create', [AdminMajorController::class, 'create'])->name('majors.create');
    Route::post('/majors/store', [AdminMajorController::class, 'store'])->name('majors.store');
    Route::delete('/majors/{id}/destory', [AdminMajorController::class, 'destroy'])->name('majors.destory');

});
////////////////////////////////////////////////////////////////////////////////////////////////


