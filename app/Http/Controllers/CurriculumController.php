<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use App\User;
use Illuminate\Http\Request;
use Image;

class CurriculumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $profiles = Curriculum::with([
            'skills', 'Experience', 'projects', 'Trainings',
        ])->get();

        return view('site.Curriculum.index', compact('profiles'));
    }

    public function create()
    {
        return view('site.Curriculum.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'first_name' => 'required|max:15',
            // 'last_name' => 'required|max:15',
            'age' => 'required',
            'address' => 'min:4|max:30',
            'phone' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'about',
         ]);

        if ($request->hasFile('image')) {
            Image::make($request->image)->resize(300, null, function ($contraint) {
                $contraint->aspectRatio();
            })->save(public_path('/images'.$request->image->hashName()));
        }
        $user = User::firstOrFail();
        $profile = new Curriculum($request->all());

        $profile->user()->associate($user)->save();

        return redirect()->route('skills.index')
                        ->with('success', 'Profile created successfully.');
    }

    public function edit(Curriculum $profile)
    {
        return view('site.Curriculum.edit', compact('profile'));
    }

    public function update(Request $request, Curriculum $profile)
    {
        $request->validate([
            // 'first_name' => 'required|max:15',
            // 'last_name' => 'required|max:15',
            'age' => 'required',
            'address' => 'min:4|max:30',
            'phone' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
         ]);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }
        $user = User::firstOrFail();
        $profile->update($request->all());
        $profile->user()->associate($user)->save();

        return redirect()->route('skills.index')
                        ->with('success', 'Profile updated successfully');
    }

    public function destroy(Curriculum $profile)
    {
        $profile->delete();

        return redirect()->route('site.Curriculum.show')
        ->with('success', 'Profile deleted successfully');
    }
}
