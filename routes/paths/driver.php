<?php

use App\Http\Controllers\driver\AllVehicleListController;
use App\Http\Controllers\driver\DriverRegistrationController;
use Illuminate\Support\Facades\Route;

Route::prefix('driver')->middleware(['auth', 'check.driver.auth'])->group(function () {
    Route::resource('registration', DriverRegistrationController::class);
    Route::get('/all-vehicles',[AllVehicleListController::class,'getAllVehicles'])->name('allVehicles');
    Route::get('/show-vehicle/{id}',[AllVehicleListController::class,'getVehicle'])->name('showVehicle');
});