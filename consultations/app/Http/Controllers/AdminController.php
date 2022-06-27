<?php

namespace App\Http\Controllers;

use App\Mail\ContactAdmin;
use App\Models\Consultation;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

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

    public function contact()
    {
        $contact = request()->validate([
            'fullname' => 'required',
            'email' => 'required|email|max:255',
            'message' => 'required|max:500'
        ]);

        // ddd($contact);
        $fullname = $contact['fullname'];
        $email = $contact['email'];
        $message = $contact['message'];

        Mail::to('sdcutn2022@gmail.com')->send(new ContactAdmin($fullname, $email, $message));
        return Redirect::back()->with('success', '¡Email enviado con éxito!');
    }
}
