<?php

use App\Http\Controllers\driver\AllVehicleListController;
use App\Http\Controllers\driver\DriverRegistrationController;
use App\Http\Controllers\driver\NotificationController;
use Illuminate\Support\Facades\Route;

Route::prefix('driver')->middleware(['auth', 'check.driver.auth'])->group(function () {
    Route::resource('registration', DriverRegistrationController::class);
    Route::get('/all-vehicles',[AllVehicleListController::class,'getAllVehicles'])->name('driver.allVehicles');
    Route::get('/show-vehicle/{id}',[AllVehicleListController::class,'getVehicle'])->name('driver.showVehicle');
    Route::get('/notifications',[NotificationController::class,'index'])->name('driver.notifications');
});