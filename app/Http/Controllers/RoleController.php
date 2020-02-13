<?php

namespace App\Http\Controllers;

use App\Role;
use App\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:list-role');
        $this->middleware('can:create-role', ['only' => ['create', 'store']]);
        $this->middleware('can:edit-role', ['only' => ['edit', 'update']]);
        $this->middleware('can:delete-role', ['only' => ['destroy']]);
    }

    public function index()
    {
        $roles = Role::all();

        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::get();

        return view('admin.roles.create', compact('permissions'));
    }

    public function store(Request $request, Role $role)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permissions' => 'required',
        ]);

        $role = Role::create(['name' => $request->input('name')]);
        $role->permissions()->sync($request->permissions);

        return redirect()->route('admin.roles.index')
            ->with('success', 'Role Created Successfully');
    }

    public function show($id)
    {
        $role = Role::findOrFail($id);

        $permissions = Permission::join(
            'permission_role',
            'permission_role.permission_id',
            '=',
            'permissions.id'
        )
            ->where('permission_role.role_id', $id)
            ->get();

        return view('admin.roles.show', compact('role', 'permissions'));
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::get();

        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            (string) 'name' => 'required|unique:roles,name|string',
            'permissions' => 'required',
        ]);

        $role = Role::findOrFail($id);
        $role->name = $request->input('name');
        $role->save();
        $role->permissions()->sync($request->permissions);

        return redirect()->route('admin.roles.index')
            ->with('success', 'Role Updated Successfully');
    }

    public function destroy(Role $role)
    {
        $role->permissions()->detach();
        $role->delete();

        return redirect()->route('admin.roles.index')
            ->with('success', 'Role Deleted Successfully');
    }
}
