<?php

use App\Http\Controllers\customer\AllVehicleListController;
use App\Http\Controllers\customer\TripDetailsController;
use Illuminate\Support\Facades\Route;

Route::prefix('customer')->middleware(['auth', 'check.customer.auth'])->group(function () {
    Route::get('get-form/{id}',[TripDetailsController::class,'index'])->name('trip.index');
    Route::get('/all-vehicles',[AllVehicleListController::class,'getAllVehicles'])->name('allVehicles');
    Route::get('/show-vehicle/{id}',[AllVehicleListController::class,'getVehicle'])->name('showVehicle');
    Route::post('/customer-trip-details',[TripDetailsController::class,'store'])->name('trip.store');
    Route::get('/customer-trip-plans',[TripDetailsController::class,'yourTripPlans'])->name('trip.plans');
});