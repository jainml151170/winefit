<?php

use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CreateUserController;
use App\Http\Controllers\WineMachineController;

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
    return view('welcome');
});

Route::middleware(['auth:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('admin-dashboard', function(){
            // return 'Admin Dashboard';
            // dd(Auth::guard('admin')->id());
            return view('admin.pages.dashboard');
        })->name('admin.dashboard');
        
        Route::view('admin-create-roles','admin.create-role')->name('admin.create.roles');
        Route::post('admin-create-roles',[RoleController::class,'store'])->name('admin.create.roles');
        Route::view('admin-create-users','admin.pages.create_users')->name('admin.create.users');
        Route::post('admin-create-users',[CreateUserController::class,'createUser'])->name('admin.create.users');
        Route::view('admin-create-wine-machine','admin.pages.create_wine_machine')->name('admin.create.winemachine');
        Route::post('admin-create-wine-machine', [WineMachineController::class, 'store'])->name('admin.create.winemachine');
    });
});

Route::middleware(['auth', 'rollAs:1'])->group(function () {
    Route::get('dashboard', function () {
        return 'Distributor';
    })->name('user.dashboard');
});

Route::middleware(['auth', 'rollAs:2'])->group(function () {
    Route::get('dashboard', function () {
        return 'user';
    })->name('user.dashboard');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');