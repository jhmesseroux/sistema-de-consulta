<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::get();
        $consultations = Consultation::get();
        $subjects = Subject::get();

        return view('admin.dashboard', [
            'users' => $users,
            'consultations' => $consultations,
            'subjects' => $subjects,
        ]);
    }
}
