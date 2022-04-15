<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('home');
});
// admin routes

Route::middleware('admin')->group(function () {

    //Dashboad

    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    // role routes
    Route::get('admin/roles', [RoleController::class, 'index']);
    Route::post('/admin/role', [RoleController::class, 'store'])->name('role.store');
    Route::get('admin/role/create', [RoleController::class, 'create'])->name('role.create');
    Route::post('admin/role/save', [RoleController::class, 'save'])->name('role.create');
    Route::get('admin/role/update/{role:id}', [RoleController::class, 'update']);


    Route::get('admin/users', [UserController::class, 'index']);
    Route::post('admin/{user:id}/verify', [UserController::class, 'verify'])->name('admin.user.verify');
});

Route::middleware('auth')->group(function () {

    Route::get('user/{dni}', [UserController::class, 'show'])->name('user.profile');
    Route::post('user/update', [UserController::class, 'update'])->name('user.update');
});


// user routes



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';