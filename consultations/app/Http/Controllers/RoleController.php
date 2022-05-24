<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule as ValidationRule;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::latest()->get();
        return view('admin.role.index', [
            'roles' => $roles
        ]);
    }

    public function create()
    {
        return view('admin.role.create');
    }

    public function update(Role $role)
    {
        return view('admin.role.update', [
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
        // return redirect('/admin/roles')->with('success', 'Rol agregado con exito!');
        return redirect()->route('admin.roles')->with('success', 'Rol agregado con exito!');
    }

    public function save(Role $role)
    {
        $attributes = request()->validate([
            'name' => ['required', 'min:3', ValidationRule::unique('roles')->ignore($role->id)],
            'description' => 'required|max:255',
            'id' => ''
        ]);

        $role->update($attributes);
        // $rol = Role::find($attributes['id']);
        // $rol->name = $attributes['name'];
        // $rol->description = $attributes['description'];
        // $rol->save();
        // other way
        Role::where('id', $attributes['id'])
            ->update($attributes);
        return redirect()->route('admin.roles')->with('success', 'Rol actualizado con exito!');
    }

    public function remove(Role $role)
    {
        return view('admin.role.remove', [
            'role' => $role
        ]);
    }

    public function delete(Role $role)
    {
        $role->delete();
        // $attributes = request();
        // Role::where('id', $attributes['id'])
        //     ->delete($attributes);
        // redirect()->route('admin.users')
        return redirect()->route('admin.roles')->with('success', 'Rol borrado con exito!');
    }
}