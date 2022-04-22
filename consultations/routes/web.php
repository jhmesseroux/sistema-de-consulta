<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SearchConsultationController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
use App\Models\Consultation;
use App\Models\Subject;
use Illuminate\Bus\UpdatedBatchJobCounts;
use Illuminate\Support\Facades\Route;
use Mockery\Matcher\Subset;

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

// subject routes

Route::get('admin/subject/', [SubjectController::class, 'index']);
Route::get('admin/subject/create', [SubjectController::class, 'create'])->name('subject.create');
Route::get('admin/subject/update/{subject:id}', [SubjectController::class, 'update'])->name('subject.update');
Route::post('admin/subject', [SubjectController::class, 'store'])->name('subject.store');
Route::patch('admin/subject/save', [SubjectController::class, 'save'])->name('subject.save');


// consultation routes
Route::get('consultation', [ConsultationController::class, 'index'])->name('consultation.index');
Route::get('consultation/create', [ConsultationController::class, 'create'])->name('consultation.create');
Route::get('consultation/update/{consultation:id}', [ConsultationController::class, 'update'])->name('consultation.update');
Route::post('consultation', [ConsultationController::class, 'store'])->name('consultation.store');
Route::patch('consultation/save', [ConsultationController::class, 'save'])->name('consultation.save');

Route::get('/search', [SearchConsultationController::class, 'show'])->name('consultation.search');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';