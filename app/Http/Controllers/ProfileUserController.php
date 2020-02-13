<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;

class ProfileUserController extends Controller
{
    public function index()
    {
        $profiles = Curriculum::orderBy('id', 'ASC')->paginate(9);

        return view('admin.profile.index', compact('profiles'));
    }

    public function show($id)
    {
        $profile = Curriculum::findOrFail($id);

        return view('admin.profile.show', compact('profile'));
    }
}
