<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    
    public function show()
    {
        return view('user.profile');
    }
   

    public function update(Request $request)
    {
        $attributes = $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'legajo' => ['required', 'string', 'max:8'],
            'dni' => ['required', 'string', 'max:8'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);
        if ($request->avatar) {
            $path = $request->file('avatar')->store('avatars');
            $attributes['avatar'] = $path;
        }

        User::where('id', auth()->id())
            ->update($attributes);
        return back()->with('success', 'Los datos del usuario actualizaron con exito!!!✅✅');
    }

   
}