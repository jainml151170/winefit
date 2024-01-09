<?php

use App\Http\Controllers\AdminController;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WineMachineController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\HomeController;

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
    return redirect()->route('login');
})->name('login');

Auth::routes();

Route::middleware(['auth:admin'])->group(function () {
    
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.pages.dashboard');
        })->name('admin.dashboard');

        Route::resource('wine-machines', WineMachineController::class);
        Route::resource('users', UserController::class);

        Route::post('admin-user-status/{id}', [UserController::class, 'changeStatus'])->name('admin.user.status');
        Route::post('/settings', [AdminController::class, 'updateSettings'])->name('admin.update.setting');
        Route::get('/account', function () {
            return view('admin.account');
        })->name('admin.account');
        Route::get('/settings', function () {
            return view('admin.setting');
        })->name('admin.setting');

    });
});

Route::middleware(['auth', 'rollAs:1'])->group(function () {
    
    
    Route::prefix('distributor')->group(function () {      
        Route::get('/account', function () {
            return view('distributor.account');
        })->name('distributor.account'); 
    
        Route::get('/settings', function () {
            return view('distributor.setting');
        })->name('distributor.setting'); 
        Route::get('/dashboard', [HomeController::class, 'distributorDashboard'])->name('distributor.dashboard');
        Route::resource('distributors', DistributorController::class);
        Route::post('/settings', [UserController::class, 'updateSettings'])->name('distributor.update.setting');
    });
});

Route::middleware(['auth', 'rollAs:2'])->group(function () {

    Route::prefix('winevendor')->group(function () {
        Route::get('/dashboard', [HomeController::class, 'distributorDashboard2'])->name('winevendor.dashboard');
    });
});

Route::get('/home', [HomeController::class, 'index'])->name('home');