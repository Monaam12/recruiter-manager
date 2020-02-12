<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('can:list-users');
    //     $this->middleware('can:edit-users', ['only' => ['edit', 'update']]);
    //     $this->middleware('can:delete-users', ['only' => ['destroy']]);
    // }

    public function index()
    {
        $users = User::where('id', '!=', Auth::id())->get();

        return view('admin.users.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.show')->with([
            'user' => $user,
        ]);
    }

    public function edit(User $user)
    {
        $roles = Role::all();

        return view('admin.users.edit', compact(['user', 'roles']));
    }

    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('admin.users.index')
            ->with('success', 'User Updated Successfully');
    }

    public function destroy(User $user)
    {
        $user->roles()->detach();
        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'User Deleted Successfully');
    }
}
