<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboard;

use App\Http\Controllers\Customer\DashboardController as CustomerDashboard;

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::group(['middleware' => ['auth', 'permission', 'verified']], function() {

    // Admin User
    Route::group([
        'prefix'    => '/admin',
        'as'        => 'admin.',
    ], function() {

        // Dashboard
        Route::get('/dashboard', AdminDashboard::class)->name('dashboard.index');
        // Route::get('/dashboard', [DashboardController::class])->name('dashboard.index');
        
    });

    Route::group([
        'prefix'    => '/customer',
        'as'        => 'customer.',
    ], function() {

        // Dashboard
        Route::get('/dashboard', CustomerDashboard::class)->name('dashboard.index');
        // Route::get('/dashboard', [DashboardController::class])->name('dashboard.index');
        
    }); 
});

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';