<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SearchConsultationController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserSettingController;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {

    // dd(Gate::allows('admin'));
    return view('home');
})->name('home');

Route::middleware('admin')->group(function () {

    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');


    Route::get('admin/roles', [RoleController::class, 'index']);
    Route::get('admin/role/create', [RoleController::class, 'create'])->name('role.create');
    Route::post('admin/role', [RoleController::class, 'store'])->name('role.store');
    Route::get('admin/role/update/{role:id}', [RoleController::class, 'update']);
    Route::post('admin/role/save', [RoleController::class, 'save'])->name('role.save');
    Route::get('admin/role/remove/{role:id}', [RoleController::class, 'remove']);
    Route::post('admin/role/delete', [RoleController::class, 'delete']);


    Route::get('admin/users', [UserController::class, 'index'])->name('admin.users');
    Route::get('admin/user/add', [UserController::class, 'create'])->name('user.create');
    Route::post('admin/user/create', [UserController::class, 'store'])->name('admin.store.user');
    Route::post('admin/user/delete/{user:id}', [UserController::class, 'delete'])->name('ADMIN.user.delete');

    Route::post('admin/{user:id}/verify', [UserController::class, 'verify'])->name('admin.user.verify');
});

Route::middleware('auth')->group(function () {

    Route::get('user/{dni}', [UserController::class, 'show'])->name('user.profile');
    Route::post('user/update', [UserController::class, 'update'])->name('user.update');
    Route::get('/setting', [UserSettingController::class, 'index'])->name('user.setting');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // meeting routes
    Route::post('meeting/save', [MeetingController::class, 'save'])->name('meeting.save');
    Route::get('meeting/user', [MeetingController::class, 'index'])->name('meeting.user');
});


Route::get('admin/subjects/', [SubjectController::class, 'index']);
Route::get('admin/subject/create', [SubjectController::class, 'create'])->name('subject.create');
Route::get('admin/subject/update/{subject:id}', [SubjectController::class, 'update'])->name('subject.update');
Route::post('admin/subject', [SubjectController::class, 'store'])->name('subject.store');
Route::patch('admin/subject/save', [SubjectController::class, 'save'])->name('subject.save');

Route::get('consultations', [ConsultationController::class, 'index'])->name('consultation.index');
Route::get('consultation/create', [ConsultationController::class, 'create'])->name('consultation.create');
Route::get('consultation/update/{consultation:id}', [ConsultationController::class, 'update'])->name('consultation.update');
Route::post('consultation', [ConsultationController::class, 'store'])->name('consultation.store');
Route::patch('consultation/save', [ConsultationController::class, 'save'])->name('consultation.save');
Route::get('consultation/delete/{consultation:id}', [ConsultationController::class, 'destroy'])->name('consultation.delete');


Route::get('/search', [SearchConsultationController::class, 'show'])->name('consultation.search');


require __DIR__ . '/auth.php';