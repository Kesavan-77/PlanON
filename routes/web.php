<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Route::get('/dashboard', function () {
    $user = User::find(Auth::id());
    $userRole = $user->user_role;
    if($userRole=='owner'){
        return to_route('vehicle.index');
    }
    elseif($userRole=='driver'){
        return to_route('registration.index');
    }
    elseif($userRole=='customer'){
        return view('customer.dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__.'/auth.php';

require __DIR__.'/paths/owner.php';

require __DIR__.'/paths/driver.php';

require __DIR__.'/paths/customer.php';