<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserSettingController extends Controller
{
    //
    public function index()
    {
        return view('user.setting');
    }

    public function deleteAvatar()
    {
        if(Auth::user()?->avatar){
            $user = User::find(Auth::user()->id);
            $user->avatar = null ;
            $user->save();
            return back()->with('success', 'Avatar borrado con exito!!');
        }
        else{
            return back();
        }
    }
}