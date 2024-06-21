<?php

use App\Http\Controllers\Owner\AllDriverListController;
use App\Http\Controllers\Owner\VehicleController;
use Illuminate\Support\Facades\Route;

Route::prefix('owner')->middleware(['auth', 'check.owner.auth'])->group(function () {
    Route::resource('vehicle', VehicleController::class);
    Route::get('/all-drivers',[AllDriverListController::class,'getAllDrivers'])->name('allDrivers');
});
