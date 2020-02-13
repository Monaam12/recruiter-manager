<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;

class ProfileUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:list-profile');
    }

    public function index()
    {
        $profiles = Curriculum::with([
            'skills', 'Experience', 'projects', 'Trainings',
        ])->orderBy('id', 'ASC')->paginate(9);

        return view('admin.profile.index', compact('profiles'));
    }

    public function show($id)
    {
        $profile = Curriculum::findOrFail($id);

        return view('admin.profile.show', compact('profile'));
    }
}
