<?php

use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CreateUserController;

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
            return view('admin.index');
        })->name('admin.dashboard');
        
        Route::view('admin-create-roles','admin.create-role')->name('admin.create.roles');
        Route::post('admin-create-roles',[RoleController::class,'store'])->name('admin.create.roles');
        Route::view('admin-create-users','admin.index')->name('admin.create.users');
        Route::post('admin-create-users',[CreateUserController::class,'createUser'])->name('admin.create.users');
    });
});

Route::middleware(['auth', 'rollAs:1'])->group(function () {
    Route::get('dashboard', function () {
        return 'Distributor';
    })->name('user.dashboard');
});

// Route::middleware(['auth', 'rollAs:2'])->group(function () {
//     Route::get('dashboard', function () {
//         return 'user';
//     })->name('user.dashboard');
// });

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');