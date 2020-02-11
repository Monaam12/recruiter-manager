<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();

        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();

        return view('admin.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        //return $request->toArray();

        request()->validate(['name' => 'required']);
        $permission = Permission::firstOrFail();
        $role = new Role($request->all());
        $role->permissions()->associate($permission);
        $role->save();

        return redirect()->route('admin.roles.index')
                        ->with('success', 'Skills Created successfully.');
    }

    public function show(Role $role)
    {
    }

    public function edit(Role $role)
    {
    }

    public function update(Request $request, Role $role)
    {
    }

    public function destroy(Role $role)
    {
    }
}
