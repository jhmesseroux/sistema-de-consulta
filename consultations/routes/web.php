<?php

use App\Http\Controllers\RoleController;
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



Route::get('role', [RoleController::class, 'index']);
Route::post('role', [RoleController::class, 'store'])->name('role.store');
Route::get('role/create', [RoleController::class, 'create'])->name('role.create');
Route::post('role/save', [RoleController::class, 'save'])->name('role.create');
Route::get('role/update/{role:id}', [RoleController::class, 'update']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';