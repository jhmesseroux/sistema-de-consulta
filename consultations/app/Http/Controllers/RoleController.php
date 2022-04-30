<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::latest()->get();
        return view('role.index', [
            'roles' => $roles
        ]);
    }

    public function create()
    {
        return view('role.create');
    }

    public function update(Role $role)
    {
        return view('role.update', [
            'role' => $role
        ]);
    }


    public function store()
    {
        $role = request()->validate([
            'name' => 'required|min:3|unique:roles,name',
            'description' => 'required|max:255'
        ]);

        Role::create($role);
        return redirect('/admin/roles');
    }

    public function save()
    {
        $attributes = request()->validate([
            'name' => 'required|min:3|unique:roles,name',
            'description' => 'required|max:255',
            'id' => ''
        ]);
        // $rol = Role::find($attributes['id']);
        // $rol->name = $attributes['name'];
        // $rol->description = $attributes['description'];
        // $rol->save();
        // other way
        Role::where('id', $attributes['id'])
            ->update($attributes);
        return redirect('/admin/roles');
    }

    public function remove(Role $role)
    {
        return view('role.remove', [
            'role' => $role
        ]);
    }

    public function delete()
    {
        $attributes = request();
        Role::where('id', $attributes['id'])
            ->delete($attributes);
        return redirect('/admin/roles');
    }
}