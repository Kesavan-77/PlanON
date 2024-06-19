<?php

use App\Http\Controllers\Owner\VehicleController;
use Illuminate\Support\Facades\Route;

Route::prefix('owner')->group(function () {
    Route::resource('vehicle', VehicleController::class)->middleware('auth');
});