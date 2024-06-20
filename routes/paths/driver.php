<?php

use App\Http\Controllers\driver\DriverRegistrationController;
use Illuminate\Support\Facades\Route;

Route::prefix('driver')->group(function () {
    Route::resource('registration', DriverRegistrationController::class);
});
