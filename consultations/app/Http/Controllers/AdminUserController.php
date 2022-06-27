<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AdminUserController extends Controller
{
    public function index()
    {
        return view('admin.users', [
            'users' => User::latest()->paginate(10),
        ]);
    }
    public function update(Request $request)
    {
        $attributes = $request->validate([
            'id' => ['required'],
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'legajo' => ['required', 'string', 'max:8'],
            'dni' => ['required', 'string', 'max:8'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'role_id' => ['required'],
        ]);

        User::where('id', $attributes['id'])
            ->update($attributes);
        return redirect()->route('admin.users')->with('success', '¡Usuario actualizado con éxito!');
    }
    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user
        ]);
    }
    public function create()
    {
        return view('admin.users.create');
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

        return redirect()->route('admin.users')->with('success', '¡Usuario agregado con éxito!');
    }


    public function delete(User $user)
    {
        $user->delete();
        return back()->with('success', '¡Usuario borrado con éxito!');
    }

    public function verify(User $user)
    {
        $res = $user->update(['verified' => true]);
        if ($res) {
            return back()->with('success', '¡Cuenta verificada exitosamente!');
        }
    }
}