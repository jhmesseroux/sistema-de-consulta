<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\ReasonCancelController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SearchConsultationController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserSettingController;
// use App\Mail\ContactAdmin;
// use App\Mail\hello;
// use App\Mail\Welcome;
use App\Models\Meeting;
// use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware('admin')->group(function () {

    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');


    Route::get('admin/role', [RoleController::class, 'index'])->name('admin.roles');
    Route::get('admin/role/create', [RoleController::class, 'create'])->name('role.create');
    Route::post('admin/role', [RoleController::class, 'store'])->name('role.store');
    Route::get('admin/role/update/{role:id}', [RoleController::class, 'update']);
    Route::post('admin/role/save/{role:id}', [RoleController::class, 'save'])->name('role.save');
    Route::delete('admin/role/delete/{role:id}', [RoleController::class, 'delete']);


    Route::get('admin/user', [AdminUserController::class, 'index'])->name('admin.users');
    Route::get('admin/user/add', [AdminUserController::class, 'create'])->name('user.create');

    Route::post('admin/user/create', [AdminUserController::class, 'store'])->name('admin.store.user');
    Route::post('admin/user/delete/{user:id}', [AdminUserController::class, 'delete'])->name('admin.user.delete');

    Route::post('admin/user/update/{user:id}', [AdminUserController::class, 'update'])->name('admin.user.update');
    Route::get('admin/user/edit/{user:id}', [AdminUserController::class, 'edit'])->name('admin.user.edit');
    Route::post('admin/{user:id}/verify', [AdminUserController::class, 'verify'])->name('admin.user.verify');

    // subject routes
    Route::get('admin/subject/', [SubjectController::class, 'index'])->name('admin.subjects');
    Route::get('admin/subject/create', [SubjectController::class, 'create'])->name('subject.create');
    Route::get('admin/subject/update/{subject:id}', [SubjectController::class, 'update'])->name('subject.update');
    Route::post('admin/subject', [SubjectController::class, 'store'])->name('subject.store');
    Route::patch('admin/subject/save', [SubjectController::class, 'save'])->name('subject.save');
    Route::delete('admin/subject/delete/{subject:id}', [SubjectController::class, 'delete'])->name('subject.delete');


    // Reason Cancel routes
    Route::get('admin/reasonCancel/', [ReasonCancelController::class, 'index']);
    Route::get('admin/reasonCancel/{id}', [ReasonCancelController::class, 'show']);
});

Route::middleware('auth')->group(function () {

    Route::get('user/{dni}', [UserController::class, 'show'])->name('user.profile');
    Route::post('user/update', [UserController::class, 'update'])->name('user.update');
    Route::get('/setting', [UserSettingController::class, 'index'])->name('user.setting');
    Route::get('/user/avatar/delete', [UserSettingController::class, 'deleteAvatar'])->name('user.deleteavatar');

    Route::get('/dashboard', function () {
        $nextMeetings = Meeting::where([['dateConsultation', '>=', date('c')], ['user_id', Auth()->user()->id]])->get();
        return view('dashboard', ['nextMeetings' => $nextMeetings]);
    })->name('dashboard');

    // meeting routes
    Route::post('meeting/save', [MeetingController::class, 'save'])->name('meeting.save');
    Route::get('meeting/user', [MeetingController::class, 'index'])->name('meeting.user');


    Route::get('consultation/information/{consultation:id}', [MeetingController::class, 'information'])->name('consultation.information');
});

Route::middleware([adminOrTeacher::class])->group(function () {

    // consultation routes
    Route::get('consultation', [ConsultationController::class, 'index'])->name('consultation.index');
    Route::get('consultation/create', [ConsultationController::class, 'create'])->name('consultation.create');
    Route::get('consultation/update/{consultation:id}', [ConsultationController::class, 'update'])->name('consultation.update');
    Route::post('consultation', [ConsultationController::class, 'store'])->name('consultation.store');
    Route::get('consultation/baja/{teacher_id}', [ConsultationController::class, 'darDeBaja']);
    Route::patch('consultation/save', [ConsultationController::class, 'save'])->name('consultation.save');
    Route::get('consultation/delete/{consultation:id}', [ConsultationController::class, 'destroy'])->name('consultation.delete');
    Route::get('consultation/information/{consultation:id}', [MeetingController::class, 'information'])->name('consultation.information');
});

// user routes
Route::get('/search', [SearchConsultationController::class, 'show'])->name('consultation.search');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/admin/contact', [AdminController::class, 'contact'])->name('contact.admin');

/* Route::get('/sendmail', function () {


    $fullname = 'Heloogfgh';
    $email = 'Heloo';
    $message = 'Heloo';

    return new ContactAdmin($fullname, $email, $message);
    // return new hello();

    // Mail::to('example@gmail.com')->send(new Welcome(Auth::user()));
    // return new JsonResponse(
    //     [
    //         'success' => true,
    //         'message' => "Thank you for subscribing to our email, please check your inbox"
    //     ],
    //     200
    // );
}); */

require __DIR__ . '/auth.php';