<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MeetingController extends Controller
{
    public function save()
    {
        if (Auth::check()) {
            // dd(request()->all());
            $attr = request()->validate([
                'comment' => 'required|max:100',
                'consultation_id' => ' required',

            ]);
            $attr['user_id'] =  Auth::id();
            Meeting::create($attr);
            return redirect('meeting/user');
            // ddd($attr);
        } else {
            ddd('error');
        }
    }
    public function index()
    {
        return view('meeting.index ', [
            'meeting' => Meeting::latest()->where('user_id', Auth::id())->get()
        ]);
    }
}