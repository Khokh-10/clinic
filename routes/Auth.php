

<?php


use App\Http\Controllers\CustomAuth\AuthController;

route::get('register',[AuthController::class,'register'])->name('auth.register');

route::post('register.store',[AuthController::class,'store'])->name('auth.store');

route::post('auth.logout',[AuthController::class,'logout'])->name('auth.logout');
//////////

route::get('login',[AuthController::class,'login'])->name('auth.login');

route::post('login.store',[AuthController::class,'dologin'])->name('auth.do.login');



