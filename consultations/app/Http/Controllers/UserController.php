<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;


class UserController extends Controller
{

    public function index()
    {
        return view('admin.users', [
            'users' => User::latest()->get(),
        ]);
    }
    public function show()
    {
        return view('user.profile');
    }
    public function create()
    {
        return view('admin.users.create');
    }
    public function verify(User $user)
    {
        $res = $user->update(['verified' => true]);
        if ($res) {
            return back()->with('success', 'Cuenta verificada exitosamente!!!✅✅');
        }
    }
    public function delete(User $user)
    {
        $user->delete();
        return back()->with('success', 'Usuario borrado con exito!!!✅✅');
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
        return back()->with('success', 'usuario actualizado con exito!!!✅✅');
    }

    public function store(Request $request)
    {

        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'legajo' => ['required', 'string', 'max:8'],
            'role_id' => ['required', 'string'],
            'dni' => ['required', 'string', 'max:8'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $role = Role::find($request->role_id);

        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'legajo' => $request->legajo,
            'verified' => $role->name === 'Profesor'  ? false : true,
            'dni' => $request->dni,
            'role_id' => $request->role_id,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        return redirect()->route('admin.users')->with('success', 'usuario agregado con exito!!!✅✅');
    }
}